<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MemberRequest;
use App\Models\Member;
use App\Models\Role;
use App\Traits\StorageImageTrait;
use Exception;
use Illuminate\Http\Request;
use DB;
use File;
use Hash;
use Illuminate\Support\Facades\Log;

class MemberController extends Controller
{
    use StorageImageTrait;

    public function index()
    {
        $member  = Member::with('roles')->get();
        return view('admin.members.index', compact('member'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::all();
        return view('admin.members.add', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemberRequest $request)
    {
        try {
            DB::beginTransaction();
            $dataUploadImg = $this->StorageTraitUpload($request,'avatar','member');
            $data = $request->all();
            $data['avatar'] = $dataUploadImg['file_path'];
            $data['password'] = Hash::make($request->password);
            $member = Member::create($data);
            $member->roles()->attach($request->role_id);
            DB::commit();
            return redirect()->route('member.index')->with('success','Thêm thành viên thành công');
        } catch (\Exception $exception) {
            DB::rollback();
            $url_link = substr($data['avatar'], 1); // xoa dau // trong url
            if (File::exists($url_link)) {
                unlink($url_link);
            }
            Log::error('Message :' . $exception->getMessage() . '--- Line: ' . $exception->getLine());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = Member::find($id);
        $roles = Role::all();
        $rolesOfMember = $member->roles;
        // dd($rolesOfMember);
        return view('admin.members.edit', [
            'member' => $member,
            'roles' => $roles,
            'rolesOfMember' => $rolesOfMember
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MemberRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $member = Member::find($id);
            $data = $request->all();
            if ($request->password) {
                $data['password'] = Hash::make($request->password);
            } else {
                $data['password'] = $member->password;
            }
            $dataUploadImg = $this->StorageTraitUpload($request,'avatar','member');
            if (!empty($dataUploadImg)) {
                $data['avatar'] = $dataUploadImg['file_path'];
                $url_file = substr($member->avatar, 1);
                    if (File::exists($url_file)) {
                        unlink($url_file);
                    }
            } else {
                $data['avatar'] = $member->avatar;
            }
            $member ->update($data);
            $member = Member::find($id);
            $member->roles()->sync($request->role_id);
            DB::commit();
            return redirect()->route('member.index')->with('success','Sửa thông tin thành công');
        } catch (\Exception $exception) {
            DB::rollback();
            $url_link = substr($data['avatar'], 1); // xoa dau // trong url
            if (File::exists($url_link)) {
                unlink($url_link);
            }
            Log::error('Message :' . $exception->getMessage() . '--- Line: ' . $exception->getLine());
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Member::find($id);
        $url_file = substr($member->avatar,1);
        if (File::exists($url_file)) {
            unlink($url_file);
        }
        $member->delete();
        $member->roles()->detach();
        return response()->json(['message'=>'Xóa thành viên thành công'], 200);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use App\Models\Permission;
use Illuminate\Http\Request;


class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $html;
    public function __construct()
    {
        $this->html= '';
    }

    public function index()
    {
        $permission = Permission::get();
        return view('admin.permissions.index', compact('permission'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Permission::all();
        $html = $this->recusiveAdd($data);

        return view('admin.permissions.add', compact('html'));
    }

    public function recusiveAdd($data, $parent_id = 0, $text = ''){
        foreach ($data as $value) {
            if ($value['parent_id'] == $parent_id) {
                $this->html .="<option value=".  $value->id . ">" .$text  . $value['name'] . "</option>";
                $this->recusiveAdd($data, $value['id'], $text . '--');
            }
        }
        return $this->html;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionRequest $request)
    {
        $data = $request->all();
        Permission::create($data);
        return redirect()->route('permission.index')->with('success','Thêm quyền thành công');
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
        $permission = Permission::find($id);
        $data = Permission::all();
        $html = $this->recusiveEdit($data, $permission->parent_id);
        return view('admin.permissions.edit', compact('data', 'html', 'permission'));
    }

    public function recusiveEdit($data, $idSelect, $parent_id = 0, $text = ''){
        foreach ($data as $value) {
            if ($value['parent_id'] == $parent_id) {
                if($idSelect == $value['id']){
                    $this->html .= "<option selected value=" . $value->id . ">" .  $text . $value->name . "</option>";

                } else{
                    $this->html .= "<option value=" . $value->id . ">" .  $text . $value->name . "</option>";
                }
                $this->recusiveEdit($data,$idSelect, $value['id'] ,$text . '--');
            }
        }
        return $this->html;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionRequest $request, $id)
    {
        $permission = Permission::find($id);

        $data = $request->all();
        // dd($data);
        $permission->update($data);
        return redirect()->route('permission.index')->with('success','Sửa quyền thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = Permission::find($id);
        $permission->delete();
        $permission->Roles()->detach();
        return response()->json([
            'message' => 'Xóa quyền thành công'
        ]);
    }
}

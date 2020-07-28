<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Role::get();
        return view('admin.roles.index', compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissionsParent = Permission::whereParentId(0)->get();
        // dd($permissionsParent);
        return view('admin.roles.add', compact('permissionsParent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $data = $request->all();
        $role = Role::create($data);
        $role->permissions()->attach($request->permission_id);
        return redirect()->route('role.index')->with('success', 'Thêm vai trò thành công');
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
        $role = Role::find($id);
        $permissionsParent = Permission::whereParentId(0)->get();
        $permissionsChecked = $role->permissions;
        // dd($permissionsChecked);
        return view('admin.roles.edit',[
            'role' => $role,
            'permissionsParent' => $permissionsParent,
            'permissionsChecked' => $permissionsChecked
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, $id)
    {
        $role = Role::find($id);
        $data = $request->all();
        $role->update($data);
        $role->permissions()->sync($request->permission_id);
        return redirect()->route('role.index')->with('success','Sửa vai trò thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $roles = Role::find($id);
        $roles->delete();
        // $role = Role::all();
        // $tabelRole = view('admin');
        return response()->json([
            'message' => 'Xóa vai trò thành công'
        ], 200);
    }
}

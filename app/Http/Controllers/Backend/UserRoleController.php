<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Backend\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserRoleController extends Controller
{
### NOTE: TO ADD NEW PERMISSION YOU HAVE TO ADD PERMISSION IN DATABASE PERMISSION TABLE AND THEN ASSIN THAT PERMISSION TO A ADMIN USER ##


  public function index()
  {
    $role = Role::all();
    $permissions = Permission::all();
    return view('Backend/pages/admin/user-role', compact('role', 'permissions'));
  }


  // create 
  public function create()
  {
    $permissions = Permission::all();
    $permissions_name = $permissions->pluck('name');
    return view('Backend.pages.admin.create-user-role', compact('permissions_name'));
  }
  public function store(Request $request)
  {
    $request->validate([
      'role_name' => 'required|unique:roles,name',
    ]);
 
    $role = Role::create(['guard_name' => 'admin', 'name' => $request->role_name]);
    $requestPermission = [];
    foreach ($request->all() as $key => $value) {
      if ($key != "_token" && $key != 'role_name') {
        $requestPermission[] = $value;
      }
    }

    $give_permission = $role->givePermissionTo($requestPermission);
  if($give_permission){
    $notification = array(
      'message' => 'Role created successfully.',
      'alert-type' => 'success'
    );

    return redirect()->route('userRoles')->with($notification);
  }
  else{
    $notification = array(
      'message' => 'Role not created successfully.',
      'alert-type' => 'error'
    );

    return redirect()->route('userRoles')->with($notification);
  }
  }



  public function destroy($id)
  {
    $role = Role::find($id);
    $role->delete();
    $notification = array(
      'message' => 'Role deleted successfully.',
      'alert-type' => 'success'
    );
    return redirect()->route('userRoles')->with($notification);
  }

  public function edit($id)
  {
    $role = Role::find($id);
    $permissions = DB::table('role_has_permissions')->where('role_id', $id)->get();
    $permission= [];
    foreach ($permissions as $per) {
      $permission[] = DB::table('permissions')->where('id', $per->permission_id)->get('name');
    }
    $permissions = Permission::all();
    $permissions_name = $permissions->pluck('name');

    return view('Backend.pages.admin.create-user-role', compact('role', 'permission', 'permissions_name'));
  }
  public function update(Request $request, $id)
  {
    $role = Role::find($id);
    $role->name = $request->role_name;
    $role->save();

    $role->revokePermissionTo($role->permissions);
    $requestPermission = [];
    foreach ($request->all() as $key => $value) {
      if ($key != "_token" && $key != 'role_name') {
        $requestPermission[] = $value;
      }
    }
   
    $give_permission = $role->givePermissionTo($requestPermission);

    if($give_permission &&$role ){

    $notification = array(
      'message' => 'Role updated successfully.',
      'alert-type' => 'success'
    );
    return redirect()->route('userRoles')->with($notification);
  }
  else{
    $notification = array(
      'message' => 'Role not updated successfully.',
      'alert-type' => 'error'
    );
    return redirect()->route('userRoles')->with($notification);
  }
  }


 

}

<?php

namespace App\Http\Controllers\Adminauth;

use App\Http\Controllers\Controller;
use App\Models\Backend\Admin;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

// use Nette\Utils\Image;
// use Intervention\Image\ImageManagerStatic as Image;




class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function admins()
    {
        //   get all admins and its role where role and admin has one to one relation
        $admins = Admin::with('role')->get();
        return view('Backend.pages.admin.admins', compact('admins'));
    }
    public function create()
    {


        return view('Backend.pages.admin.create-admin');
    }

    /** 
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'phone' => ['required', 'string', 'max:255', 'unique:admins'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {

            $image_name = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/images/admin', $image_name);
        } else {
            $image_name = 'default.png';
        }
        $admin = Admin::create([
            'name' => $request->name,
            'role_id' => $request->role_id,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $image_name,
            'password' => Hash::make($request->password)
        ]);
        $roleName = Role::find($request->role_id);
        $admin->assignRole($roleName);
        $permissions = $roleName->permissions;
        $model_has_permissions =   $admin->givePermissionTo($permissions);
        if($admin &&$model_has_permissions ){
        $notification = array(
            'message' => 'Admin Created Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admins')->with($notification);
    }
    else{
        $notification = array(
            'message' => 'Admin not Created!',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
    }
    // edit admin 
    public function edit($id)
    {
        $admin = Admin::find($id);
        return view('Backend.pages.admin.create-admin', compact('admin'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', ],
            'phone' => ['required', 'string', 'max:255', ],
            'role_id' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $image_name = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/images/admin', $image_name);
        }
        $admin_user = Admin::find($id);
        $admin =  Admin::find($id)->update([
            'name' => $request->name,
            'role_id' => $request->role_id,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $image_name ?? $admin_user->image,
        ]);
        // get role where id is 7 in ROle model 
        $role = Role::find($request->role_id);
        $admin_user->syncRoles('');  // remove all previous role 
        $assin_role =  $admin_user->assignRole($role);
        $permissions = $role->permissions;
        $admin_user->revokePermissionTo($admin_user->permissions);   //remove all previous permission
        $model_has_permissions =   $admin_user->givePermissionTo($permissions);
        if ($admin && $assin_role && $model_has_permissions) {

            session()->flash('message', 'Admin User updated successfully');
            return redirect()->route('admins');
        } else {
            session()->flash('error', 'Admin User not updated');
            return redirect()->back();
        }
    }
    // soft delete admin 
    public function delete($id)
    {
        // find role_id by $id 
        $role_id = Admin::find($id)->role_id;
        $roleName = Role::find($role_id)->first();
        $admin =   Admin::find($id)->delete();
        $admin->removeRole($roleName);
        $admin->removePermissionTo($admin->permissions);
        return redirect()->route('admins')->with('success', 'Admin User  deleted successfully');
    }
    // serach role from roles table 
    public function searchRole(Request $request)
    {

        $customer = Role::where('name', 'LIKE', '%' . $request->input('term', '') . '%')
            ->get(['id', 'name as text']);
        return ['results' => $customer];
    }
}

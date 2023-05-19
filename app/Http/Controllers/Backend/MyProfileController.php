<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Backend\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class MyProfileController extends Controller
{
    public function index()
    {
        $admin = Admin::find(Auth::guard('admin')->user()->id);
        return view('Backend.pages.myprofile', compact('admin'));
    }
    public function update(Request $request)

    {
        // validate the form data
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => ['required', Rules\Password::defaults()],
        ]);
      
      
     if ($request->hasFile('image')) {
      
        $image_name= $request->file('image')->getClientOriginalName();
         $request->file('image')->storeAs('public/images/admin',$image_name);
     }
     else{
         $image_name= $request->old_image;
        }
 
        $admin = Admin::find(Auth::guard('admin')->user()->id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->password = Hash::make($request->password);
        $admin->image = $image_name;
        $admin->save();
      

        return redirect()->back()->with('success', 'Profile Updated Successfully');
    }
    // accountSetting 
    public function accountSetting()
    {
        $admin = Admin::find(Auth::guard('admin')->user()->id);
        return view('Backend.pages.admin.account-setting', compact('admin'));
    }
}

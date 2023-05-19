<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use App\Models\Backend\Customer;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;




class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $client_id = $request->client_id;
        $customers = Customer::where('user_id', $client_id)->get();
        return view('Backend.pages.customers', compact('customers'));
    }
    //  create customer 
    public function create()
    {
        return view('Backend.pages.create-customer');
    }
    // store customer
    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'profile_image' => 'required',
           
        ]);
        if ($request->hasFile('profile_image')) {
      
            $image_name= $request->file('profile_image')->getClientOriginalName();
             $request->file('profile_image')->storeAs('public/images/customers',$image_name);
         }     
        $customer = new Customer();
        $customer->user_id=1;                    // will be changed
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->customer_number = 'abc123';     //will be changed
        $customer->profile_image =  $image_name;
        $customer->status=$request->status? 1 : 0 ?? 0;
        $customer->save();
        return redirect()->route('customers')->with('success', 'Customer created successfully');
    }
    // edit customer
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('Backend.pages.create-customer', compact('customer'));
    }
    // update customer
    public function update(Request $request, $id)
    {
        $request->validate([

            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'profile_image' => 'required',
           
        ]);    
         
        if ($request->hasFile('profile_image')) {
      
            $image_name= $request->file('profile_image')->getClientOriginalName();
             $request->file('profile_image')->storeAs('public/images/customers',$image_name);
         }
       
     
        $customer = Customer::find($id);
        $customer->user_id=1;                    // will be changed
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->customer_number = 'abc123';     //will be changed
        $customer->profile_image =  $image_name;
        $customer->status=$request->status? 1 : 0 ?? 0;
        $customer->save();
        return redirect()->route('customers')->with('success', 'Customer updated successfully');
    }
    // delete customer
     public function delete($id)
     {
         $customer = Customer::find($id);
         $customer->delete();
         return redirect()->route('customers')->with('success', 'Customer deleted successfully');
    }
     // status change 
     public function status(Request $request)
     {
         $Customer = Customer::find($request->customer_id);
 
         $Customer->status = $request->status;
         $Customer->save();
         return response()->json(['success'=>'Status change successfully.']);
     }
   
}

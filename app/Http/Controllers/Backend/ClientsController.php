<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\UserDetail;
use App\Models\Backend\Address;
use App\Models\User;
use App\Models\StripClient;
use Illuminate\Support\Facades\DB;

class ClientsController extends Controller
{
    public function index()
    {
        //    get all clients and their customer , invoices according to their id eqloent relationship

        $clients = User::with('customers', 'invoices')->get();

        return view('Backend.pages.client.clients', compact('clients'));
    }
    //  create client 
    public function create()
    {
        return view('Backend.pages.client.create-client');
    }
    //  store User details
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'display_name' => 'required',
            'short_description' => 'required',
            'sales_tax' => 'required',
            'date_format' => 'required',
            'invoice_number_format' => 'required',
        ]);

        if ($request->hasFile('logo')) {

            $image_name = $request->file('logo')->getClientOriginalName();
            $request->file('logo')->storeAs('public/images/client', $image_name);
        } else {
            $image_name = 'noimage.jpg';
        }
        //  echo $image_name;
        $user_details = new UserDetail();
        $user_details->user_id = $request->client_id;                    // will be changed
        $user_details->title = $request->title;
        $user_details->display_name = $request->display_name;
        $user_details->logo =  $image_name;
        $user_details->short_description = $request->short_description;
        $user_details->push_notifications = $request->push_notifications ? 1 : 0 ?? 0;
        $user_details->email_notifications = $request->email_notifications ? 1 : 0 ?? 0;
        $user_details->auto_apply_sales_tax = $request->auto_apply_sales_tax ? 1 : 0 ?? 0;
        $user_details->sales_tax = $request->sales_tax;
        $user_details->auto_gen_invoice_num = $request->auto_gen_invoice_num ? 1 : 0 ?? 0;
        $user_details->date_format = $request->date_format;
        $user_details->invoice_number_format = $request->invoice_number_format;
        $user_details->save();

        $notification = array(
            'message' => 'Client created successfully!',
            'alert-type' => 'success'
        );


        return redirect()->route('clients')->with($notification);
    }
    // soft delete client 
    public function delete($id)
    {
        $UserDetail = UserDetail::find($id);
        $UserDetail->delete();
        $notification = array(
            'message' => 'User Detail deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    // status change 
    public function statusChange(Request $request)
    {
        $UserDetail = UserDetail::find($request->client_id);

        $UserDetail->status = $request->status;
        $UserDetail->save();
        return response()->json(['success' => 'Status change successfully.']);
    }
    // search client
    public function clientFilter(Request $request)
    {
        $client = User::where('first_name', 'LIKE', '%' . $request->input('term', '') . '%')
            ->get(['id', 'first_name as text']);
        return ['results' => $client];
    }
}

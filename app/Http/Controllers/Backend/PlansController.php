<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Plan;


class PlansController extends Controller
{
    public function index()
    {
        $plans = Plan::all();
        return view('Backend.pages.plans', compact('plans'));
    }
    public function create()
    {
        return view('Backend.pages.createplan');
    }
    public function store(Request $request )
    {
        $request->validate([ 
            'title' => 'required',
            'price' => 'required',
            'duration_days' => 'required',
            'number_of_invoices' => 'required',
            'charge_per_transaction' => 'required',
            'charge_per_alert' => 'required',
            'max_allowed_coustomers' => 'required',
        ]);
        
        {
          
            $plan = new Plan();
            $plan->title = $request->title;
            $plan->price = $request->price;
            $plan->duration_days = $request->duration_days;
            $plan->number_of_invoices = $request->number_of_invoices;
            $plan->send_postal = $request->send_postal ? 1 : 0 ?? 0;
            $plan->sms = $request->sms ? 1 : 0 ?? 0;
            $plan->email = $request->email ? 1 : 0 ?? 0;
            $plan->charge_per_transaction = $request->charge_per_transaction? 1 : 0 ?? 0;
            $plan->charge_per_alert = $request->charge_per_alert? 1 : 0 ?? 0;
            $plan->status = $request->status ? 1 : 0 ?? 0;
            $plan->max_allowed_coustomers = $request->max_allowed_coustomers;
            $plan->save();
           $notification = array(
               'message' => 'Plan created successfully',
               'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }      
      
    }
    // update plan 
    public function edit($id)
    {
        $plan = Plan::find($id);
        return view('Backend.pages.createplan', compact('plan'));
    }
    public function update(Request $request, $id)
    {
        // $request->validate([ 
        //     'title' => 'required',
        //     'price' => 'required',
        //     'duration_days' => 'required',
        //     'number_of_invoices' => 'required',
        //     'charge_per_transaction' => 'required',
        //     'charge_per_alert' => 'required',
        //     'max_allowed_coustomers' => 'required',
        // ]);
        
        {
          
            $plan = Plan::find($id);
            $plan->title = $request->title;
            $plan->price = $request->price;
            $plan->duration_days = $request->duration_days;
            $plan->number_of_invoices = $request->number_of_invoices;
            $plan->send_postal = $request->send_postal ? 1 : 0 ?? 0;
            $plan->sms = $request->sms ? 1 : 0 ?? 0;
            $plan->email = $request->email ? 1 : 0 ?? 0;
            $plan->charge_per_transaction = $request->charge_per_transaction? 1 : 0 ?? 0;
            $plan->charge_per_alert = $request->charge_per_alertv? 1 : 0 ?? 0;
            $plan->status = $request->status ? 1 : 0 ?? 0;
            $plan->max_allowed_coustomers = $request->max_allowed_coustomers;
            $plan->save();
        
              $notification = array(
                'message' => 'Plan updated successfully',
                'alert-type' => 'success');
            return redirect()->route('plans')->with($notification);
        }      
      
    }
    // soft delete plan
    public function delete($id)
    {
        $plan = Plan::find($id);
        $plan->delete();
        $notification = array(
            'message' => 'Plan deleted successfully',
            'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
    // status change
    public function status(Request $request)
    {
        $Plan = Plan::find($request->plan_id);

        $Plan->status = $request->status;
        $Plan->save();
        return response()->json(['success'=>'Status Updated successfully.']);
    }
    


}

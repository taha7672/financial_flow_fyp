<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Backend\Invoice;

class DashboardController extends Controller
{
    // auth check 
    public function __construct()
    {
        $this->middleware('ApiAuthCheck');
    }

    
    // get all
    public function index(Request $request)
    {
        $user_id = Auth::id();
        // $user_id = 51;
        $invoices = Invoice::where('client_id', $user_id)->get();
        // filter $invoices data daily weekly monthly as given from input 
        if ($request->has('filter')) {
            $filter = $request->filter;
            if ($filter == 'daily') {
                $invoices = Invoice::where('client_id', $user_id)->whereDate('invoice_date', date('Y-m-d'))->get();
            }
            if ($filter == 'weekly') {
                $invoices = Invoice::where('client_id', $user_id)->whereBetween('invoice_date', [now()->startOfWeek(), now()->endOfWeek()])->get();
            }
            if ($filter == 'monthly') {
                $invoices = Invoice::where('client_id', $user_id)->whereMonth('invoice_date', date('m'))->get();
            }
        }
        //  if invoice is not empty then return the response
        if ($invoices){
            return response()->json([
                'status' => true,
                'message' => 'Invoice List', 
                'data' => $invoices
            ]);
        }
            else {
                return response()->json([
                    'status' => false,
                    'message' => 'Invoice Not Found',
                    'data' => []
                ]);
            
        }
    
             

    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Admin;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Backend\Invoice;
use App\Models\Backend\Transaction;

class AdminHomeController extends Controller
// Dashboard Controller
{
    // if user is not logged in then redirect to login page
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login');
        }
        $total_clients = User::count();
        $active_clients = User::count();
        $total_invoices = Invoice::count();
        $recent_invoices = Invoice::where('created_at', '>=', now()->subDays(7))->count();
        $total_paid_invoices = Invoice::where('paid_status', 1)->count();
        $total_unpaid_invoices = Invoice::where('paid_status', 0)->count();
        $total_discounts = Invoice::sum('invoice_discount');
        $total_transactions = Invoice::where('paid_status', 1)->sum('inv_total_amount');
        // find actice client percentage 
        if ($active_clients == 0 || $total_clients == 0) {
            $active_clients_percentage = 0;
        } else {
            $active_clients_percentage = ($active_clients / $total_clients) * 100;
        }
        if ($total_paid_invoices == 0 || $total_invoices == 0) {
            $paid_invoices_percentage = 0;
        } else {
            $paid_invoices_percentage = ($total_paid_invoices / $total_invoices) * 100;
        }
        if ($total_unpaid_invoices == 0 || $total_invoices == 0) {
            $unpaid_invoices_percentage = 0;
        } else {
            $unpaid_invoices_percentage = ($total_unpaid_invoices / $total_invoices) * 100;
        }
        if ($total_discounts == 0 || $total_transactions == 0) {
            $discount_percentage = 0;
        } else {
            $discount_percentage = ($total_discounts / $total_transactions) * 100;
        }
        // find recent_invoices percentage 
        if ($recent_invoices == 0 || $total_invoices == 0) {
            $recent_invoices_percentage = 0;
        } else {
            $recent_invoices_percentage = ($recent_invoices / $total_invoices) * 100;
        }


        return view('Backend.layouts.dashboard', compact(
            'total_clients',
            'total_invoices',
            'recent_invoices',
            'total_paid_invoices',
            'total_unpaid_invoices',
            'total_discounts',
            'total_transactions',
            'active_clients_percentage',
            'paid_invoices_percentage',
            'unpaid_invoices_percentage',
            'discount_percentage',
            'recent_invoices_percentage'
        ));
    }
    // // get monthly data
    public function getPayments(Request $request)
    {
        $selected_month = $request->input('selected_month');

        ## Read value
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page
        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        // Custom search filter 
        // $searchClient = $request->get('searchClient'); 

  
        // Total records
        $records = Transaction::whereMonth('created_at', $selected_month)->select('count(*) as allcount');
        $totalRecords = $records->count();

        // Total records with filter
        $records =  Transaction::whereMonth('created_at', $selected_month)->select('count(*) as allcount')
            ->where('invoice_number', 'like', '%' . $searchValue . '%');



        $totalRecordswithFilter = $records->count();

        // Fetch records
        $records =Transaction::whereMonth('created_at', $selected_month)->with(['invoice.client', 'invoice.customer'])
            ->where('invoice_number', 'like', '%' . $searchValue . '%');
   

        $payments = $records->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();
        $i =1;
        foreach ($payments as $pay) {
            
            $data_arr[] = array(
                "id" => $i++,
                "payment_date" => dateFormat($pay->payment_date),
                "client_name" => $pay->invoice->client->first_name,
                "customer_name" => $pay->invoice->customer->name,
                "invoice_number" => $pay->invoice_number,
                "total_amount" => $pay->total_amount,
            );
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr,

        );

        echo json_encode($response);
        exit;
    }
}

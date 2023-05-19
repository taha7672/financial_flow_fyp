<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Invoice;

class ReceivableController extends Controller
{
    // index 
    public function index()
    {
        return view('Backend.pages.receivable.index');
    }
    // getReceivable
    public function getReceivable(Request $request)
    {


         $selectedTab = $request->get('selectedTab');
        $start_date =changeFormat($request->get('start_date'));
        $end_date = changeFormat($request->get('end_date'));
        $client_id = $request->get('client');
        $customer_id = $request->get('customer');
        $req_status = $request->get('status');
       
 
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
        $records = Invoice::select('count(*) as allcount');

        // ## Add custom filter conditions
        if (!empty($selectedTab)) {
            if($selectedTab== 'unpaid'){
                $records->where('paid_status', '=', '0');
            }
            if($selectedTab== 'paid'){
                $records->where('paid_status', '=', '1');
            }
            if($selectedTab== 'all'){
                $records;
            }
            
        }
        if(!empty($start_date != '-1' || $end_date != '-1')){
            $records->whereBetween('invoice_date', [$start_date, $end_date]);
        }
        if(!empty($client_id )){
            $records->where('client_id', '=', $client_id);
        }
        if(!empty($customer_id)){
            $records->where('customer_id', '=', $customer_id);
        }
        if(!empty($req_status)){
            if($req_status == 'PAID'){
                $records->where('paid_status', '=', '1');
            }
            if($req_status == 'UNPAID'){
                $records->where('paid_status', '=', '0');
            }
            if($req_status == 'PARPAID'){
                $records;
            }

        }

       
    
        $totalRecords = $records->count();

        // Total records with filter
        $records = Invoice::select('count(*) as allcount')
            ->join('customers', 'invoices.customer_id', '=', 'customers.id')
            ->join('users', 'invoices.client_id', '=', 'users.id')
            ->select('invoices.*', 'customers.name as customer_name', 'users.first_name as client_name')
            ->where('invoice_number', 'like', '%' . $searchValue . '%');



        ## Add custom filter conditions
        if (!empty($selectedTab)) {
            if($selectedTab== 'unpaid'){
                $records->where('paid_status', '=', '0');
            }
            if($selectedTab== 'paid'){
                $records->where('paid_status', '=', '1');
            }
            if($selectedTab== 'all'){
                $records;
            }
        }
        if(!empty($start_date != '-1' || $end_date != '-1')){
            $records->whereBetween('invoice_date', [$start_date, $end_date]);
        }
        if(!empty($client_id)){
            $records->where('client_id', '=', $client_id);
        }
        if(!empty($customer_id)){
            $records->where('customer_id', '=', $customer_id);
        }
        if(!empty($req_status)){
            if($req_status == 'PAID'){
                $records->where('paid_status', '=', '1');
            }
            if($req_status == 'UNPAID'){
                $records->where('paid_status', '=', '0');
            }
            if($req_status == 'PARPAID'){
                $records;
            }

        }

      
        $totalRecordswithFilter = $records->count();

        // Fetch records
        $records = Invoice::orderBy($columnName, $columnSortOrder)
            ->join('customers', 'invoices.customer_id', '=', 'customers.id')
            ->join('users', 'invoices.client_id', '=', 'users.id')
            ->select('invoices.*', 'customers.name as customer_name', 'users.first_name as client_name')
            ->where('invoice_number', 'like', '%' . $searchValue . '%')
            ->with('transaction')
            ;
        ## Add custom filter conditions
        if (!empty($selectedTab)) {
            if($selectedTab== 'unpaid'){
                $records->where('paid_status', '=', '0');
            }
            if($selectedTab== 'paid'){
           
                $records->where('paid_status', '=', '1');
            }
            if($selectedTab== 'all'){
                $records;
            }
            
        }
        if(!empty($start_date != '-1' && $end_date != '-1')){
            $records->whereBetween('invoice_date',[$start_date, $end_date]);
        }
        if(!empty($client_id )){
            $records->where('client_id', '=', $client_id);
        }
        if(!empty($customer_id)){
            $records->where('customer_id', '=', $customer_id);
        }
        if(!empty($req_status)){
            if($req_status == 'PAID'){
                $records->where('paid_status', '=', '1');
            }
            if($req_status == 'UNPAID'){
                $records->where('paid_status', '=', '0');
            }
            if($req_status == 'PARPAID'){
                $records;
            }
        }
        $invoices = $records->skip($start)
            ->take($rowperpage)
            ->get();
          

        $data_arr = array();
        $paidAmount = 0;
        foreach ($invoices as $invoice) {
            foreach ($invoice->transaction as $transaction) {
                $paidAmount += $transaction->total_amount;
            }
            $data_arr[] = array(
                "invoice_date" => dateFormat($invoice->invoice_date),
                "client_name" => $invoice->client_name,
                "customer_name" => $invoice->customer_name,
                "invoice_number" => $invoice->invoice_number,
                "amount_due" => $invoice->inv_total_amount - $paidAmount,
                "paid_status" => $invoice->paid_status,
                "status"=> $invoice->status
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

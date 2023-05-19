<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Invoice;
use App\Models\Backend\InvoiceBody;
use App\Models\Backend\Customer;
use App\Models\User;     //clients
use App\Models\Backend\StripeClient;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\StripClient;
use Illuminate\Support\Str;
use Ramsey\Uuid\Type\Integer;

class InvoicesController extends Controller
{
    public function index(Request $request)

    {

        return view('Backend.pages.invoice.invoices');
    }

    public function getInvoice(Request $request)
    {
        $client_id = $request->get('client_id');
        $inv_status = $request->get('inv_status');



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
        $searchClient = $request->get('searchClient');
        $searchCustomer = $request->get('searchCustomer');
        $searchInvoiceNumber = $request->get('searchInvoiceNumber');
        // Total records
        $records = Invoice::select('count(*) as allcount');

        ## Add custom filter conditions
        if (!empty($searchClient)) {
            $records->where('client_id', $searchClient);
        }
        if (!empty($searchCustomer)) {
            $records->where('customer_id', $searchCustomer);
        }
        if (!empty($searchInvoiceNumber)) {
            $records->where('invoice_number', 'like', '%' . $searchInvoiceNumber . '%');
        }
        if (!empty($client_id)) {
            $records->where('client_id', $client_id);
        }
        if (!empty($inv_status)) {
            // if($inv_status == 'all'){
            //     // $records;
            // }
            if ($inv_status == 'paid') {
                $records->where('paid_status', '1');
            }
            if ($inv_status == 'unpaid') {
                $records->where('paid_status', '0');
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
        if (!empty($searchClient)) {
            $records->where('client_id', $searchClient);
        }
        if (!empty($searchCustomer)) {
            $records->where('customer_id', $searchCustomer);
        }
        if (!empty($searchInvoiceNumber)) {
            $records->where('invoice_number', 'like', '%' . $searchInvoiceNumber . '%');
        }
        if (!empty($client_id)) {
            $records->where('client_id', $client_id);
        }
        if (!empty($inv_status)) {
            // if($inv_status == 'all'){
            //     // $records;
            // }
            if ($inv_status == 'paid') {
                $records->where('paid_status', '1');
            }
            if ($inv_status == 'unpaid') {
                $records->where('paid_status', '0');
            }
        }
        $totalRecordswithFilter = $records->count();

        // Fetch records
        $records = Invoice::orderBy($columnName, $columnSortOrder)
            ->join('customers', 'invoices.customer_id', '=', 'customers.id')
            ->join('users', 'invoices.client_id', '=', 'users.id')
            ->select('invoices.*', 'customers.name as customer_name', 'users.first_name as client_name')
            ->where('invoice_number', 'like', '%' . $searchValue . '%');
        ## Add custom filter conditions
        if (!empty($searchClient)) {
            $records->where('client_id', $searchClient);
        }
        if (!empty($searchCustomer)) {
            $records->where('customer_id', $searchCustomer);
        }
        if (!empty($searchInvoiceNumber)) {
            $records->where('invoice_number', 'like', '%' . $searchInvoiceNumber . '%');
        }
        if (!empty($client_id)) {
            $records->where('client_id', $client_id);
        }
        if (!empty($inv_status)) {
            // if($inv_status == 'all'){
            //     // $records;
            // }
            if ($inv_status == 'paid') {
                $records->where('paid_status', '1');
            }
            if ($inv_status == 'unpaid') {
                $records->where('paid_status', '0');
            }
        }

        $invoices = $records->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();

        foreach ($invoices as $invoice) {
            $data_arr[] = array(
                "invoice_date" => dateFormat($invoice->invoice_date),
                "invoice_number" => $invoice->invoice_number,
                "customer_name" => $invoice->customer_name,
                "client_name" => $invoice->client_name,
                "inv_total_amount" => $invoice->inv_total_amount,
                "paid_status" => $invoice->paid_status,
                "status" => $invoice->status,
                "action" => ' <div class="btn-group">
                <button type="button" class="btn btn-success">Action</button>
                <button type="button"
                    class="btn btn-success dropdown-toggle dropdown-toggle-split"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only"></span>
                </button>
                <div class="dropdown-menu">
                <a class="dropdown-item" target="_blank" href="' . url('admin/inv-detail/' . $invoice->inv_uinque_key) . '">INV Detail</a>
                    <a class="dropdown-item" href="javascript:void(0)" onclick="markComp(' . $invoice->id . ')">Mark Completed</a>
                    <a class="dropdown-item" href="javascript:void(0)" onclick="deleteInvoice(' . $invoice->id . ')">Delete</a>
                </div>
            </div>',

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
    public function create()
    {
        return view('Backend.pages.invoice.create-invoice');
    }
    // store invoice 
    public function store(Request $request)
    {
       
        $request->validate([
            'invoice_date' => 'required',
            'due_date' => 'required',
            'invoice_number' => 'required',
            'sub_total' => 'required',
            'total_amount' => 'required',
        ]);
        $invoice = Invoice::create([
            'client_id' => $request->client_id,
            'customer_id' => $request->customer_id,
            'invoice_date' => FormatForDB($request->invoice_date),
            'due_date' => FormatForDB($request->due_date),
            'invoice_number' => $request->invoice_number,
            'sub_total' => $request->sub_total,
            // if request  tax is not applied then tax field  will be 0 
            'tax_amount' => $request->tax ? $request->tax : 0,
            'invoice_discount' => 0,   //now this will apply sepratly
            'inv_total_amount' => $request->total_amount,
            'paid_status' => 0,
            'status' => 1,
            'inv_uinque_key' => 'INV-' . strtoupper(Str::random(1)) . '-' . rand(1000, 9999),

        ]);
        $invoice_id = $invoice->id;
        $product_name = $request->product_name;
        $short_description = $request->short_description;
        $quantity = $request->quantity;
        $unit_cost = $request->unit_cost;
        $total = $request->amount; //amount
        $count = count($product_name);
        for ($i = 0; $i < $count; $i++) {
            $invoice_body = new InvoiceBody();
            $invoice_body->invoice_id = $invoice_id;
            $invoice_body->product_name = $product_name[$i];
            $invoice_body->short_description = $short_description[$i];
            $invoice_body->quantity = $quantity[$i];
            $invoice_body->unit_cost = $unit_cost[$i];
            $invoice_body->total = $total[$i];
            $invoice_body->save();
        }

        if ($invoice) {
            session()->flash('message', 'Invoice created successfully!');
            return redirect()->route('invoices');
        } else {
            session()->flash('error', 'Invoice not created');
            return redirect()->back();
        }
    }
    // soft delete  and its relative record from invoice body
    public function delete($id)
    {

        $invoice = Invoice::findOrFail($id);
        $invoice->delete();
        $invoice_body = InvoiceBody::where('invoice_id', $id)->delete();
        if ($invoice && $invoice_body) {
            return response()->json(['message' => 'Invoice deleted successfully']);
        } else {
            return response()->json(['message' => 'Something went wrong']);
        }
    }
    // markComplete 
    public function markComplete($id)
    {

        $invoice = Invoice::findOrFail($id);
        $invoice->status = 'Completed';   // Completed
        $invoice->save();
        if ($invoice) {
            return response()->json(['message' => 'Invoice Marked as Completed']);
        } else {
            return response()->json(['message' => 'Something went wrong']);
        }
    }

    // Search filter 
    public function customerFilter(Request $request)
    {
        $customer = Customer::where('name', 'LIKE', '%' . $request->input('term', '') . '%')
            ->get(['id', 'name as text']);
        return ['results' => $customer];
    }

    public function clientFilter(Request $request)
    {
        $client = User::where('first_name', 'LIKE', '%' . $request->input('term', '') . '%')
            ->get(['id', 'first_name as text']);
        return ['results' => $client];
    }
    //  filterInvoice

    public function filterInvoice(Request $request)
    {
        if ($request->client_id) {
            $invoices = Invoice::where('client_id', $request->client_id)->get();
        }
        // filter by customer name
        elseif ($request->customer_id) {
            $invoices = Invoice::where('customer_id', $request->customer_id)->get();
        }
        return ['results' => $invoices];
        // store invoices in session 
        $request->session()->put('invoices', $invoices);
        return view('Backend.pages.invoice.invoices', compact('invoices'));
    }

    // client.search in create invoice page
    public function clientSearch(Request $request)
    {
        $client = User::where('first_name', 'LIKE', '%' . $request->input('term', '') . '%')
            ->get(['id', 'first_name as text']);
        return ['results' => $client];
    }
    // customer.search in create invoice page
    public function customerSearch(Request $request)
    {
        $client_id = $request->input('client_id');
        if ($client_id) {
            $customer = Customer::where('user_id', $client_id)->where('name', 'LIKE', '%' . $request->input('term', '') . '%')
                ->get(['id', 'name as text']);
            return ['results' => $customer];
        } else {
            $customer = Customer::where('name', 'LIKE', '%' . $request->input('term', '') . '%')
                ->get(['id', 'name as text']);
            return ['results' => $customer];
        }
        // $customer = Customer::where('user_id', $client_id)->where('name', 'LIKE', '%' . $request->input('term', '') . '%')
        //     ->get(['id', 'name as text']);
        // return ['results' => $customer];
    }
    // select customer depend on client id
    public function selectCustomer(Request $request)
    {
        $client_id = $request->id;
        $customer = Customer::where('user_id', $client_id)->get(['id', 'name']);
        echo json_encode($customer);
    }
    //  invoice details 
    public function invDetails(Request $request)
    {
        // get inv_uinque_key  from url 
        $inv_uinque_key = $request->inv_uinque_key;

        $invoice = Invoice::with('invoice_body', 'client', 'customer', 'stripe_client')->where('inv_uinque_key', $inv_uinque_key)->first();
        // dd($invoice);
        return view('Backend.pages.invoice.inv-details', compact('invoice'));
    }
}

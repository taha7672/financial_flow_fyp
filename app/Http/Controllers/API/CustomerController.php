<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Customer;
use Illuminate\Support\Facades\Auth;
use App\Models\Backend\Invoice;
use App\Models\Backend\Transaction;
use App\Traits\UploadImg;
use Illuminate\Support\Facades\Storage;
use stdClass;

class CustomerController extends Controller
{
    use UploadImg;
    // get all customer 
    public function index()
    {
        $client_id = Auth::id();
        $customers = Customer::where('user_id', $client_id)->where('status', 1)->get();
        // if customer is not empty then return the response
        if (!$customers->isEmpty()) {
            return response()->json([
                'status' => true,
                'message' => 'Customer List',
                'data' => $customers
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Customer Not Found',
                'data' => []
            ]);
        }
    }
    // search customer by name || address || phone and return the customer
    public function search($search)
    {
        $customers = Customer::where('status', 1)
            ->orwhere('name', 'like', '%' . $search . '%')
            ->orWhere('address', 'like', '%' . $search . '%')
            ->orWhere('phone', 'like', '%' . $search . '%')
            ->get();
        // if customer is not empty then return the response
        if (!$customers->isEmpty()) {
            return response()->json([
                'status' => true,
                'message' => 'Customer List',
                'data' => $customers
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Customer Not Found',
                'data' => []
            ]);
        }
    }
    // get customer by id and return the response
    // public function show(Request $request)
    // {
    //     $user_id = Auth::id();
    //     $customer_id = $request->customer_id;
    //     $customer = Customer::where('user_id', $user_id)->where('id', $customer_id)->first();
    //     // return $customer; 
    //     if ($customer) {
    //         // GET INVOICE BY CUSTOMER ID AND STATUS IS 1  with transaction from transactions table 
    //         $invoices = Invoice::where('customer_id', $customer_id)->where('client_id', $user_id)->where('status', 1)->get();
    //         $invoiceTransactions = [];

    //         // Next, loop through each invoice and retrieve its associated transactions
    //              foreach ($invoices as $invoice) {
    //             $transaction = $invoice->transaction;

    //             // Loop through each transaction and add the total_amount and payment_date to the invoiceTransactions array
    //             foreach ($transaction as $transaction) {
    //                 $invoiceTransactions[] = [
    //                     'invoice_id' => $transaction->invoice_id,
    //                     'title'=> 'Received Payment',
    //                     'payment_amount' => $transaction->total_amount,
    //                     'payment_date' => $transaction->payment_date
    //                 ];
    //             }
    //         }

    //         if (!$invoices->isEmpty()) {
    //             // latest invoice by updated at  from $invoices only its total amount where paid status is 1
    //             $latestInvoice = $invoices->where('paid_status', 1)->sortByDesc('updated_at')->first();
    //             $latestInvoiceNonPaid = $invoices->where('paid_status', 0)->sortByDesc('updated_at')->first();
    //             if ($latestInvoice) {
    //                 $latestPaidInvDate = $latestInvoice->updated_at;
    //                 $latestPaidInvAmount = $latestInvoice->inv_total_amount;
    //             }
    //             if ($latestInvoiceNonPaid) {
    //                 $latestNonPaidInvDate = $latestInvoiceNonPaid->updated_at;
    //             }
    //             // total paid amount from $invoices where paid status is 1
    //             $totalPaidAmount = $invoices->where('paid_status', 1)->sum('inv_total_amount');
    //             // total due amount from $invoices where paid status is 0
    //             $totalDueAmount = $invoices->where('paid_status', 0)->sum('inv_total_amount');
    //             $dueInvoices = $invoices->where('paid_status', 0)->toArray();
    //             // dd($paidInvoices);
    //             $dueInv = [];

    //             foreach ($dueInvoices as $dueInvoices) {
    //                 $obj = new  stdClass();
    //                 $obj->invoice_id = $dueInvoices['id'];
    //                 $obj->title = 'Sent Invoice';
    //                 $obj->inv_date = $dueInvoices['updated_at'];
    //                 $obj->inv_total_amount = $dueInvoices['inv_total_amount'];
    //                 $dueInv[] = $obj;
    //             }
    //         }



    //         //    if customer and invoice has data 
    //         if ($customer) {

    //             return response()->json([
    //                 'status' => true,
    //                 'message' => 'Customer Found Successfully',
    //                 'data' => $customer,
    //                 'latestPaidInvDate' =>   $latestPaidInvDate ?? null,
    //                 'latestNonPaidInvDate' =>   $latestNonPaidInvDate ?? null,
    //                 'latestPaidInvAmount' => $latestPaidInvAmount ?? null,
    //                 'totalPaidAmount' =>  $totalPaidAmount ?? null,
    //                 'totalDueAmount' => $totalDueAmount ?? null,
    //                 'paidInvoices' => $invoiceTransactions ?? null,
    //                 'dueInvoices' => $dueInv ?? null,
    //                 // 'transaction' => $invoiceTransactions ?? null,



    //             ]);
    //         }
    //     } else {
    //         return response()->json([
    //             'status' => false,
    //             'message' => 'Customer Details Not Found',
    //             'data' => []
    //         ]);
    //     }
    // }
    // // get customer by id and return the response
    public function show(Request $request)
    {
        $user_id = Auth::id();
        $customer_id = $request->customer_id;

        $customer = Customer::where('user_id', $user_id)->where('id', $customer_id)->first();
        if (!$customer) {
            return response()->json([
                'status' => false,
                'message' => 'Customer Details Not Found',
                'data' => []
            ]);
        }
        $invoices = Invoice::where('customer_id', $customer_id)
            ->where('client_id', $user_id)
            ->where('status', 1)
            ->with('transaction')
            ->get();

        $invoiceTransactions = [];
        $dueInv = [];
        $latestPaidInvDate = null;
        $latestNonPaidInvDate = null;
        $latestPaidInvAmount = null;
        $totalPaidAmount = 0;
        $totalDueAmount = 0;

        foreach ($invoices as $invoice) {
            $transactions = $invoice->transaction;

            foreach ($transactions as $transaction) {
                $invoiceTransactions[] = [
                    'invoice_id' => $transaction->invoice_id,
                    'title' => 'Received Payment',
                    'payment_amount' => $transaction->total_amount,
                    'payment_date' => $transaction->payment_date
                ];
            }

            if ($invoice->paid_status == 1) {
                if (is_null($latestPaidInvDate) || $latestPaidInvDate < $invoice->updated_at) {
                    $latestPaidInvDate = $invoice->updated_at;
                    $latestPaidInvAmount = $invoice->inv_total_amount;
                }
                $totalPaidAmount += $invoice->inv_total_amount;
            } else {
                if (is_null($latestNonPaidInvDate) || $latestNonPaidInvDate < $invoice->updated_at) {
                    $latestNonPaidInvDate = $invoice->updated_at;
                }
                $totalDueAmount += $invoice->inv_total_amount;

                $obj = new stdClass();
                $obj->invoice_id = $invoice->id;
                $obj->title = 'Sent Invoice';
                $obj->inv_date = $invoice->updated_at;
                $obj->inv_total_amount = $invoice->inv_total_amount;
                $dueInv[] = $obj;
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Customer Found Successfully',
            'data' => $customer,
            'latestPaidInvDate' => $latestPaidInvDate,
            'latestNonPaidInvDate' => $latestNonPaidInvDate,
            'latestPaidInvAmount' => $latestPaidInvAmount,
            'totalPaidAmount' => $totalPaidAmount,
            'totalDueAmount' => $totalDueAmount,
            'paidInvoices' => $invoiceTransactions,
            'dueInvoices' => $dueInv,
        ]);
    }

    // create new customer and return the response
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'address' => 'required|string|max:255',
    //         'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
    //         'email' => 'required|email',

    //     ]);

    //     $client_id = Auth::id();
    //     // if file has data then store the file in storage/app/public/customers folder
    //     if ($request->hasFile('profile_image')) {
    //         $file_name= $this->uploadImg('/customers', $request->profile_image);

    //     } else {
    //         return response()->json([
    //             'status' => false,
    //             'message' => 'Profile Image not found',
    //             'data' => []
    //         ]);

    //     }
    //     // id data is exist then update otherwise crete new data 
    //     if ($request->id) {
    //         $customer = Customer::where('id', $request->id)
    //             ->update([
    //                 'name' => $request->name,
    //                 'description' => $request->description,
    //                 'address' => $request->address,
    //                 'phone' => $request->phone,
    //                 'email' => $request->email,
    //                 'status' => 1,
    //                 'customer_number' => rand(100, 999) . '-' . rand(100, 999) . '-' . rand(100, 999),
    //                 'profile_image' => $file_name,
    //             ]);
    //             // delete the previous image 
    //     } else {
    //         $customer = Customer::create([
    //             'user_id' => $client_id,
    //             'name' => $request->name,
    //             'description' => $request->description,
    //             'address' => $request->address,
    //             'phone' => $request->phone,
    //             'email' => $request->email,
    //             'status' => 1,
    //             'customer_number' => rand(100, 999) . '-' . rand(100, 999) . '-' . rand(100, 999),
    //             'profile_image' => $file_name,
    //         ]);
    //     }

    //     if ($customer) {
    //         return response()->json([
    //             'status' => true,
    //             'message' => 'Customer Created Successfully',
    //             'data' => $customer
    //         ]);
    //     } else {
    //         return response()->json([
    //             'status' => false,
    //             'message' => 'Customer Not Created',
    //             'data' => []
    //         ]);
    //     }
    // }

    public function store(Request $request)
    {
        $this->validateRequest($request);
        $client_id = Auth::id();
        if ($request->hasFile('profile_image')) {
            $file_name = $this->uploadImg('/customers', $request->profile_image);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Profile Image not found',
                'data' => []
            ]);
        }

        $customer = tap(Customer::updateOrCreate(['id' => $request->id], [
            'user_id' => $client_id,
            'name' => $request->name,
            'description' => $request->description,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'status' => 1,
            'customer_number' => rand(100, 999) . '-' . rand(100, 999) . '-' . rand(100, 999),
        ]), function ($customer) use ($file_name) {
            if ($file_name) {
                Storage::disk('uploads')->delete('/customers' . $customer->profile_image);
                $customer->profile_image = $file_name;
                $customer->save();
            }
        });

        return $customer
            ? response()->json([
                'status' => true,
                'message' => 'Customer Created Successfully',
                'data' => $customer
            ])
            : response()->json([
                'status' => false,
                'message' => 'Customer Not Created',
                'data' => []
            ]);
    }

    private function validateRequest(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            'email' => 'required|email',
        ]);
    }
}

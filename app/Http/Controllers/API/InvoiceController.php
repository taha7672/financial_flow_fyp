<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Invoice;
use App\Models\Backend\InvoiceBody;
use Illuminate\Support\Str;
use App\Models\Backend\Attachment;
use Illuminate\Support\Facades\Storage;
use App\Models\Backend\Discount;
use App\Models\Backend\Transaction;
use stdClass;
use App\Models\Backend\Ledger;

class InvoiceController extends Controller
{
    // create invoice 
    public function create(Request $request)
    {
        $user_id = auth()->user()->id;
        $today = now();
        $invoice_number = 'INV-' . rand(1000, 9999);
        $sale_tax = $request->auto_tax == 1 ? 6.67 : 0;

        ### CUSTOMER ID SHOULD BE INCLUDE IN CREATE INVOICE REQUEST ###
        $invoice = $this->createInvoice($user_id, $today, $invoice_number);
        $invoice_id = $invoice->id;
        $total_sum = 0;
        $services = $request->services;
        foreach ($services as $service) {
            $invoice_body = new InvoiceBody();
            $invoice_body->invoice_id = $invoice_id;
            $invoice_body->product_name = $service['product_name'] ?? '';
            $invoice_body->short_description = $service['short_description'];
            $invoice_body->quantity = $service['quantity'];
            $invoice_body->unit_cost = $service['unit_cost'];
            // find total amount of each service
            $total = $service['quantity'] * $service['unit_cost'];
            $invoice_body->total = $total;
            $invoice_body->save();
            $total_sum += $total;
            // loop on service 
            $attachments = $service['attachments'];
            if ($attachments) {
                foreach ($attachments as $attach) {
                    $attachment = new Attachment();
                    $attachment->invoice_body_id = $invoice_body->id;
                    $attachment->attachment_name = $attach['name'];
                    $file = $attach['file'];
                    $file_name = time() . '_' . $file->getClientOriginalName();
                    $file->storeAs('/invoices/attach', $file_name, ['disk' => 'uploads']);
                    $attachment->file = $file_name;
                    $attachment->save();
                }
            }
        }

        tap($invoice)->update(['inv_total_amount' => $total_sum]);
        // ledger 
        if ($invoice) {
            $client_id = $invoice->client_id;
            $customer_id = $invoice->customer_id;
            $invoice_id = $invoice_id;
            $type = 'Invoice';
            $narration =  'Invoice created';
            $credit = 0.00;
            $debit = $total_sum;
            // customerLedger 
            $customerLedger =   Ledger::customerLedger($client_id, $customer_id, $invoice_id, $type, $narration, $credit, $debit);
            // clientLedger
            $credit = $total_sum;
            $debit = 0.00;
            $clientLedger =  Ledger::clientLedger($client_id, $customer_id, $invoice_id, $type, $narration, $credit, $debit);
        }

        if ($invoice && $invoice_body) {
            return response()->json([
                'status' => true,
                'message' => 'Invoice created successfully',
                'data' => $invoice,
                'invoice_body' => $invoice_body,
                'attachment' => $attachments,
                'file' => $file_name,
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'data' => []
            ]);
        }
    }
    private function createInvoice($userId, $today, $invoiceNumber)
{
    return Invoice::create([
        'client_id' => $userId,
        'customer_id' => 55,
        'invoice_date' => $today,
        'due_date' => null,
        'invoice_number' => $invoiceNumber,
        'sub_total' => 0,
        'tax_amount' => 0,
        'invoice_discount' => 0,
        'inv_total_amount' => 0,
        'paid_status' => 0,
        'status' => 1,
        'inv_uinque_key' => 'INV-' . strtoupper(Str::random(1)) . '-' . rand(1000, 9999) . '-' . strtoupper(Str::random(3)),
    ]);
}
    // // get all invoices where client_id is $user_id 
    // public function getAllInvoicesReq(Request $request)
    // {
    //     $user_id = auth()->user()->id;
    //     $invoices = Invoice::where('client_id', $user_id)->get();
    //     // loop through invoices and add 1 fiels in object name title 
    //     // if paid_status is 1 then title is Paid Invoice else title is Sent Invoice
    //     $allInvoices = [];
    //     foreach ($invoices as $invoice) {
    //         $obj = new  stdClass();
    //         $obj->invoice_id = $invoice->id;
    //         $obj->client_id = $invoice->client_id;
    //         $obj->customer_id = $invoice->customer_id;
    //         $obj->invoice_number = $invoice->invoice_number;
    //         $obj->inv_date = $invoice->invoice_date;
    //         $obj->inv_total_amount = $invoice->inv_total_amount;
    //         $obj->status = $invoice->status;
    //         if ($invoice->paid_status == 1) {
    //             $obj->title = 'Received Payment';
    //         } else {
    //             $obj->title = 'Sent Invoice';
    //         }
    //         $allInvoices[] = $obj;
    //     }
    //     if ($invoices->isNotEmpty() && $allInvoices) {
    //         return response()->json([
    //             'status' => true,
    //             'message' => 'Invoices found',
    //             'data' => $allInvoices,
    //         ]);
    //     } else {
    //         return response()->json([
    //             'status' => false,
    //             'message' => 'No invoices found',
    //             'data' => []
    //         ]);
    //     }
    // }
    public function getAllInvoicesReq(Request $request)
{
    $user_id = auth()->user()->id;
    $invoices = Invoice::where('client_id', $user_id)
        ->select('id', 'client_id', 'customer_id', 'invoice_number', 'invoice_date', 'inv_total_amount', 'status', 'paid_status')
        ->get();

    $allInvoices = $invoices->map(function ($invoice) {
        $title = ($invoice->paid_status == 1) ? 'Received Payment' : 'Sent Invoice';
        return (object) [
            'invoice_id' => $invoice->id,
            'client_id' => $invoice->client_id,
            'customer_id' => $invoice->customer_id,
            'invoice_number' => $invoice->invoice_number,
            'inv_date' => $invoice->invoice_date,
            'inv_total_amount' => $invoice->inv_total_amount,
            'status' => $invoice->status,
            'title' => $title,
        ];
    });

    if ($allInvoices->isNotEmpty()) {
        return response()->json([
            'status' => true,
            'message' => 'Invoices found',
            'data' => $allInvoices,
        ]);
    } else {
        return response()->json([
            'status' => false,
            'message' => 'No invoice found',
            'data' => [],
        ]);
    }
}

    // get  invoices from $request->invoice_id  and also find if it has any discount or transaction

    // public function getInvoiceDetailReq(Request $request)
    // {
    //     // return 'get invoices';
    //     $user_id = auth()->user()->id;
    //     $invoice_id = $request->invoice_id;
    //     $invoices = Invoice::where('id', $invoice_id)->where('client_id', $user_id)->with('customer', 'invoice_body')->get();
    //     // invoice_number from $invoices 
    //     // if $invoices is not empty then get invoice_number from $invoices[0]->invoice_number
    //     $invoice_number = '';
    //     if ($invoices->isNotEmpty()) {
    //         $invoice_number = $invoices[0]->invoice_number;
    //     }



    //     // find total inv_total_amount 
    //     $total_amount = 0;
    //     foreach ($invoices as $invoice) {
    //         $total_amount += $invoice->inv_total_amount;
    //     }
    //     // find total paid amount 
    //     $total_paid_amount = 0;
    //     foreach ($invoices as $invoice) {
    //         // invoice inv_total where paid_status 1
    //         if ($invoice->paid_status == 1) {
    //             $total_paid_amount += $invoice->inv_total_amount;
    //         }
    //     }
    //     // find total due amount
    //     $total_due_amount = 0;
    //     foreach ($invoices as $invoice) {
    //         // invoice inv_total where paid_status 0
    //         if ($invoice->paid_status == 0) {
    //             $total_due_amount += $invoice->inv_total_amount;
    //         }
    //     }
    //     //  find total discount 
    //     $total_discount = 0;
    //     foreach ($invoices as $invoice) {
    //         $total_discount += $invoice->invoice_discount;
    //     }
    //     // find balance 
    //     $balance = $total_amount - $total_paid_amount - $total_discount;
    //     if ($invoice_number) {
    //         $discount = Discount::where('invoice_number', $invoice_number)->get();
    //         $transaction = Transaction::where('invoice_number', $invoice_number)->get();

    //         $invoiceDiscount = [];
    //         foreach ($discount as $discount) {
    //             $invoiceDiscount[] = [
    //                 'discount_id' => $discount->invoice_number,
    //                 'title' => 'Discount',
    //                 'discount_amount' => $discount->amount,
    //                 'discount_date' => $discount->discount_date
    //             ];
    //         }
    //         // same for trnsaction
    //         $invoiceTransactions = [];
    //         foreach ($transaction as $transaction) {
    //             $invoiceTransactions[] = [
    //                 'transaction_id' => $transaction->invoice_number,
    //                 'title' => 'Received Payment',
    //                 'payment_amount' => $transaction->total_amount,
    //                 'payment_date' => $transaction->payment_date
    //             ];
    //         }
    //     }

    //     // if $invoice is not empoty 

    //     if ($invoices && $invoices->count() > 0) {

    //         return response()->json([
    //             'status' => true,
    //             'message' => 'Invoices fetched successfully',
    //             'data' => $invoices,
    //             'discount' => $invoiceDiscount,
    //             'transaction' => $invoiceTransactions,
    //             'total_amount' => $total_amount,
    //             'total_paid_amount' => $total_paid_amount,
    //             'total_due_amount' => $total_due_amount,
    //             'total_discount' => $total_discount,
    //             'balance' => $balance,

    //         ]);
    //     } else {
    //         return response()->json([
    //             'status' => false,
    //             'message' => 'Something went wrong / Invoice number not found',
    //             'data' => []
    //         ]);
    //     }
    // }
    public function getInvoiceDetailReq(Request $request)
{
    $user_id = auth()->user()->id;
    $invoice_id = $request->invoice_id;

    $invoices = Invoice::where('id', $invoice_id)
        ->where('client_id', $user_id)
        ->with('customer', 'invoice_body')
        ->get();

    if ($invoices->isEmpty()) {
        return response()->json([
            'status' => false,
            'message' => 'Invoice number not found',
            'data' => []
        ]);
    }

    $invoice_number = $invoices[0]->invoice_number;
    $invoice_bodies = $invoices->pluck('invoice_body')->flatten();

    $total_amount = $invoice_bodies->sum('total');
    $total_paid_amount = $invoice_bodies->where('paid_status', 1)->sum('total');
    $total_due_amount = $invoice_bodies->where('paid_status', 0)->sum('total');
    $total_discount = $invoices->sum('invoice_discount');
    $balance = $total_amount - $total_paid_amount - $total_discount;

    $discounts = Discount::where('invoice_number', $invoice_number)->get();
    $transactions = Transaction::where('invoice_number', $invoice_number)->get();

    $invoiceDiscount = $discounts->map(function ($discount) {
        return [
            'discount_id' => $discount->invoice_number,
            'title' => 'Discount',
            'discount_amount' => $discount->amount,
            'discount_date' => $discount->discount_date
        ];
    });

    $invoiceTransactions = $transactions->map(function ($transaction) {
        return [
            'transaction_id' => $transaction->invoice_number,
            'title' => 'Received Payment',
            'payment_amount' => $transaction->total_amount,
            'payment_date' => $transaction->payment_date
        ];
    });

    return response()->json([
        'status' => true,
        'message' => 'Invoices fetched successfully',
        'data' => $invoices,
        'discount' => $invoiceDiscount,
        'transaction' => $invoiceTransactions,
        'total_amount' => $total_amount,
        'total_paid_amount' => $total_paid_amount,
        'total_due_amount' => $total_due_amount,
        'total_discount' => $total_discount,
        'balance' => $balance
    ]);
}


//   testing map function 
public function mapMethod(){
    $invoice = Invoice::with('invoice_body')->get();
    $inv = $invoice->map(function($invoice){
        $invoice_body = $invoice->invoice_body;
        return [
            'invoice_number' => $invoice->invoice_number,
            'invoice_date' => $invoice->invoice_date,
            'due_date' => $invoice->due_date,
            'total' => $invoice->total,
            'paid_status' => $invoice->paid_status,
            'invoice_id' => $invoice->id,
         
            'invoice_body' => $invoice_body->map(function($invoice_body){
                return [
                    'invoice_body_id' => $invoice_body->id,
                    'invoice_body_title' => $invoice_body->title,
                    'invoice_body_description' => $invoice_body->description,
                    'invoice_body_quantity' => $invoice_body->quantity,
                    'invoice_body_unit_price' => $invoice_body->unit_price,
                    'invoice_body_total' => $invoice_body->total,
                    'invoice_body_paid_status' => $invoice_body->paid_status,
                ];
            })

           
        ];
    });
    return response()->json([
        'status' => true,
        'message' => 'Invoices fetched successfully',
        'data' => $inv,
    ]);

}
   

 




}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Backend\Invoice;
use Illuminate\Http\Request;
use App\Models\Backend\Transaction;
use Illuminate\Support\Facades\Auth;
use App\Models\Backend\Attachment;
use App\Models\Backend\Discount;
use App\Models\Backend\Ledger;
use App\Traits\UploadImg;

class TransactionController extends Controller
{
    use UploadImg;
    // create transaction 
    public function create(Request $request)
    {
        // return 'transaction';
        $request->validate([
            'invoice_number' => 'required',
            'description' => 'required',
            'payment_date' => 'required',
            'total_amount' => 'required',
        ]);

        if ($request->hasFile('attachment')) {
            $img = $request->attachment;
        } else {
            return response()->json([
                'status' => false,
                'message' => 'File not found',
                'data' => []
            ]);
        }
        $invoiceNumber = $request->invoice_number;
        $paymentDate = date('Y-m-d', strtotime($request->payment_date));
        $paymentAmount = $request->total_amount;
        $paymentDescription = $request->description;
        $img = $request->attachment;
        $transaction = new Transaction();
        $req_type = 'API';
        $response = $transaction->createTransAndUpdateInvStatus($invoiceNumber, $paymentDate, $paymentAmount, $paymentDescription, $img,$req_type);
            if ($response) {
                return sendResponse($response['status'], $response['message'], $response['data']);

            } else {
                return sendResponse($response['status'], $response['message'], $response['data']);
            
             }
            
    }


    //  apply discount on invoice 
    public function applyDiscount(Request $request)
    {
        $request->validate([
            'invoice_number' => 'required',
            'description' => 'required',
            'discount_date' => 'required',
            'amount' => 'required',
        ]);
        $invoice = Invoice::where('invoice_number', $request->invoice_number)->first(['id', 'client_id', 'customer_id']);
        if ($invoice != null) {
            $invoice_id = $invoice->id;
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Invoice not found',
                'data' => []
            ]);
        }
        //  if acchtment doest has file 
        if ($request->hasFile('attachment')) {
            $file = $request->attachment;
            $file_name = $this->uploadFile('/discount/attach', $file);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'File not found',
                'data' => []
            ]);
        }
        $discount = Discount::create([
            'invoice_number' => $request->invoice_number,
            'description' => $request->description,
            'discount_date' => $request->discount_date,
            'amount' => $request->amount,
            'attachment' => $file_name,
        ]);
        if ($discount) {
            $client_id = $invoice->client_id;
            $customer_id = $invoice->customer_id;
            $invoice_id = $invoice_id;
            $type = 'Discount';
            $narration =  $discount->description;
            $credit = $discount->amount;
            $debit = 0.00;
            // customerLedger 
            $customerLedger =   Ledger::customerLedger($client_id, $customer_id, $invoice_id, $type, $narration, $credit, $debit);
            // clientLedger
            $credit = 0.00;
            $debit = $discount->amount;
            $clientLedger =  Ledger::clientLedger($client_id, $customer_id, $invoice_id, $type, $narration, $credit, $debit);
        }

        if ($discount) {
            return response()->json([
                'status' => true,
                'message' => 'Discount applied successfully',
                'data' => $discount,
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Discount not applied',
                'data' => []
            ]);
        }
    }
}

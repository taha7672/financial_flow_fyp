<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Customer;
use App\Models\Backend\Invoice;
use App\Models\Backend\Transaction;
use App\Traits\UploadImg;
use Illuminate\Support\Facades\Storage;



class TransactionController extends Controller
{
    use UploadImg;
    public function index()
    {
        $transaction = Transaction::with('invoice.customer.user')->get();


        return view('Backend.pages.transactions.transactions', compact('transaction'));
    }
    // create.transaction
    public function create()
    {
        return view('Backend.pages.transactions.create-transaction');
    }
    // store 
    public function store(Request $request)
    {

        $request->validate([
            'invoice_number' => 'required',
            'payment_date' => 'required',
            'payment_amount' => 'required',
            'payment_description' => 'required',
            'attachment' => 'required',
        ]);
        $invoiceNumber = $request->invoice_number;
        $paymentDate = date('Y-m-d', strtotime($request->payment_date));
        $paymentAmount = $request->payment_amount;
        $paymentDescription = $request->payment_description;
        $img = $request->attachment;
        $transaction = new Transaction();
        $req_type = 'web';
        $success = $transaction->createTransAndUpdateInvStatus($invoiceNumber, $paymentDate, $paymentAmount, $paymentDescription, $img, $req_type);
        if ($success) {
            return redirect()->route('transactions');
        } else {
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $tran = Transaction::find($id);
        return view('Backend.pages.transactions.create-transaction', compact('tran'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'invoice_number' => 'required',
            'payment_date' => 'required',
            'payment_amount' => 'required',
            'payment_description' => 'required',
        ]);

        $payment_date =  $request->payment_date;
        $payment_date = date('Y-m-d', strtotime($payment_date));
        $file = $request->attachment;
        $req_type = 'web';
        $transaction = new Transaction();
        $result = $transaction->updateTransactionAndUpdateInvStatus($id, $request->invoice_number, $payment_date, $request->payment_amount, $request->payment_description, $file, $req_type);
        if ($result) {
            return redirect()->route('transactions');
        } else {
            return redirect()->back();
        }
    }

    // soft delete
    public function delete($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();
        // response to ajax 
        return response()->json(['message' => 'Transaction Deleted Successfully!']);
    }

    // search customers 
    public function search(Request $request)
    {
        $customer = Customer::where('name', 'LIKE', '%' . $request->input('term', '') . '%')
            ->get(['id', 'name as text']);
        return ['results' => $customer];
    }
}

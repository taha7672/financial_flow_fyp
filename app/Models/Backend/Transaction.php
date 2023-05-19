<?php

namespace App\Models\Backend;

use App\Traits\UploadImg;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, SoftDeletes, UploadImg;
    // fillables
    protected $fillable = [
        'customer_id',
        'user_id',
        'invoice_id',
        'invoice_number',
        'description',
        'payment_date',
        'total_amount',
        'attachment',
    ];
    // transcations has many to one relationship with user
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    // transcations has many to one relationship with customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    // has many to one relation with invoice

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    /**
     * Create a transaction and update invoice paid status if necessary.
     *
     * @param string $invoiceNumber The invoice number.
     * @param string $paymentDate The payment date in Y-m-d format.
     * @param float $paymentAmount The payment amount.
     * @param string $paymentDescription The payment description.
     * @param string $attachment The transaction attachment.
     *
     * @return bool Whether the transaction was created successfully or not.
     */

    public function createTransAndUpdateInvStatus(string $invoiceNumber, string $paymentDate, float $paymentAmount, string $paymentDescription,  $img, $req_type)
    {
        $invoice = Invoice::where('invoice_number', $invoiceNumber)->select('id', 'client_id', 'customer_id')->first();

        if (!$invoice) {
            session()->flash('error', 'Invoice Not Found!');
            return false;
        }
        $client_id = $invoice->client_id;
        $customer_id = $invoice->customer_id;
        $invoiceId = $invoice->id;
        $transaction = new Transaction();
        $transaction->invoice_id = $invoiceId;
        $transaction->payment_date = $paymentDate;
        $transaction->invoice_number = $invoiceNumber;
        $transaction->total_amount = $paymentAmount;
        $transaction->description = $paymentDescription;
        $transaction->attachment = $this->uploadImg('/transaction/attach', $img);
        $transaction->save();
        if (!$transaction) {
            $message = 'Transaction Not Created';
            if($req_type == 'web'){
                session()->flash('error', $message);
                return false;
            }
            else{
                return ['status' => false, 'message' => $message];
            }
        }
        $type= 'Transaction';
        $narration = 'Transaction';
        $credit =0.00;
        $debit =  $transaction->total_amount;
        // customerLedger 
        $customerLedger=   Ledger::customerLedger( $client_id,$customer_id, $invoiceId, $type, $narration, $credit, $debit);
        // clientLedger
        $credit =  $transaction->total_amount;
        $debit = 0.00;
        $clientLedger=  Ledger::clientLedger( $client_id,$customer_id, $invoiceId, $type, $narration, $credit, $debit);
        $invoiceTotalAmount = Invoice::where('invoice_number', $invoiceNumber)->value('inv_total_amount');

        if ($paymentAmount >= $invoiceTotalAmount) {
            Invoice::where('invoice_number', $invoiceNumber)->update(['paid_status' => 1]);
        }
        $message = 'Transaction created successfully!';
        if($req_type == 'web'){
            session()->flash('message', $message);
            return true;
        }
        else{
            return ['status' => true, 'message' => $message, 'data' => $transaction];
        }
    }


    public function updateTransactionAndUpdateInvStatus($id, string $invoiceNumber, string $paymentDate, float $paymentAmount, string $paymentDescription, $file, $req_type)
{
    $invoice = Invoice::where('invoice_number', $invoiceNumber)->select('id', 'client_id', 'customer_id')->first();

    if (!$invoice) {
        session()->flash('error', 'Invoice Not Found!');
        return false;
    }
    $client_id = $invoice->client_id;
    $customer_id = $invoice->customer_id;
    $invoiceId = $invoice->id;
    $transaction = Transaction::find($id);
    $transaction->invoice_id = $invoiceId;
    $transaction->payment_date = $paymentDate;
    $transaction->invoice_number = $invoiceNumber;
    $transaction->total_amount = $paymentAmount;
    $transaction->description = $paymentDescription;
    $oldImgName = $transaction->attachment;
    if ($file) {
        if ($oldImgName) {
            $path = asset('storage/images/transaction/attach/');
            $deleteImg = $this->deleteImg($path, $oldImgName);
        }
        $transaction->attachment = $this->uploadImg('/transaction/attach', $file);
    }
    $transaction->save();

    if (!$transaction) {
        $message = 'Transaction Not Updated';
        if($req_type == 'web'){
            session()->flash('error', $message);
            return false;
        }
        else{
            return ['status' => false, 'message' => $message];
        }
    }
    $type= 'Transaction';
    $narration = 'Transaction';
    $credit =0.00;
    $debit =  $transaction->total_amount;
    // customerLedger 
    $customerLedger=   Ledger::customerLedger( $client_id,$customer_id, $invoiceId, $type, $narration, $credit, $debit);
    // clientLedger
    $credit =  $transaction->total_amount;
    $debit = 0.00;
    $clientLedger=  Ledger::clientLedger( $client_id,$customer_id, $invoiceId, $type, $narration, $credit, $debit);
    $invoiceTotalAmount = Invoice::where('invoice_number', $invoiceNumber)->value('inv_total_amount');
    if ($paymentAmount >= $invoiceTotalAmount) {
        Invoice::where('invoice_number', $invoiceNumber)->update(['paid_status' => 1]);
    }
    $message = 'Transaction updated successfully!';
    if($req_type == 'web'){
        session()->flash('message', $message);
        return true;
    }
    else{
        return ['status' => true, 'message' => $message, 'data' => $transaction];
    }
}

}

<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StripeReceipt extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'stripe_receipts';
    protected $fillable = [
        'user_id',
        'customer_id',
        'stripe_charge_id',
        'stripe_receipt_url',
        'stripe_receipt_file',
        'stripe_receipt_amount',
        'stripe_receipt_status',
        'stripe_receipt_created',
        'stripe_receipt_currency',
        'stripe_receipt_description',
        'stripe_receipt_destination',
        'stripe_receipt_destination_payment',
        'stripe_receipt_source',
    ];
}

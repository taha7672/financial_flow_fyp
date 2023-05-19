<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoiceBody extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'invoice_id',
        'product_name',
        'short_description',
        'quantity',
        'unit_cost',
        'total',   //amount
    ];
}

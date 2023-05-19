<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory;
    use softDeletes;
    protected $fillable = [
        'client_id',
        'customer_id',
        'invoice_date',
        'due_date',
        'invoice_number',
        'sub_total',
        'tax_amount',
        'invoice_discount',
        'inv_total_amount',
        'paid_status',
        'status',
        'inv_uinque_key',


    ];
    public function invoice_body()
    {
        return $this->hasMany(InvoiceBody::class);
    }
    // customer has one to many relation with invoice
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
     
  
    // client name from id
    // clients is defiend as users  
    public function client()
    {
         
        return $this->belongsTo('App\Models\User', 'client_id');
    }
    // many to one relation with StripeClient model
    public function stripe_client()
    {
        return $this->belongsTo(StripeClient::class , 'client_id', 'user_id'); 
    }
    // has one to many  relation ship with transactions table as invoice_number
    public function transaction()
    {
        return $this->hasMany(Transaction::class );
    }
    // has one to many relation with discount '
    public function discount()
    {
        return $this->hasMany(Discount::class);
    }
    
  
}


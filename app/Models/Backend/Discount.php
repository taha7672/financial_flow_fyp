<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discount extends Model
{
    use HasFactory , softDeletes;
    protected $fillable = [
        'invoice_id',
        'invoice_number',
        'discount_date',
        'amount',
        'description',
        'attachment',
    ];
     // discount has many to one relationship with user
     public function user()
     {
         return $this->belongsTo('App\Models\User');
     }
     // discount has many to one relationship with customer
     public function customer()
     {
         return $this->belongsTo(Customer::class);
     }
     // has many to one relation with invoice
 
     public function invoice()
     {
         return $this->belongsTo(Invoice::class );
     }
     
}

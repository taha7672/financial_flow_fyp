<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'address',
        'customer_number',
        'profile_image',
        'status',
    ];
    // has many to one relationship with user model
    public function user()
    {
        return $this->belongsTo('App\Models\User' , 'user_id', 'id');
    }
    // has one to many relationship with invoice model local key user_id forign key client_id
    public function invoices()
    {
        return $this->hasMany('App\Models\Backend\Invoice', 'client_id', 'user_id');
    }
 
}

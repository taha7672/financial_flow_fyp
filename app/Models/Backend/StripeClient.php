<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StripeClient extends Model
{
    use HasFactory;

    protected $table = 'stripe_clients';
    protected $fillable = [
        'user_id',
        'stripe_account_id',
        'stripe_account_status',
        'stripe_account_type',
    ];

}

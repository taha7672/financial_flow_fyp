<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'title',
        'duration_days',
        'number_of_invoices',
        'send_postal',
        'sms',
        'email',
        'charge_per_transaction',
        'charge_per_alert',
        'status',
        'max_allowed_coustomers',

    ];
}

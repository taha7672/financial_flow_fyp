<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserDetail extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'title',
        'display_name',
        'logo',
        'short_description',
        'push_notifications',
        'email_notifications',
        'auto_apply_sales_tax',
        'sales_tax',
        'auto_gen_invoice_num',
        'date_format',
        'invoice_number_format',
        'status',
    ];
}

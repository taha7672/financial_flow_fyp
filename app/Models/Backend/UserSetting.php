<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserSetting extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'user_id',
        'auto_tax',
        'tax_rate',
        'auto_inv_number',
        'inv_number_format',
        'cus_number_format',
        'setting_updated',
    ];
}

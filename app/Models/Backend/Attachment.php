<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attachment extends Model
{
    use HasFactory , SoftDeletes;
    // fillables
    protected $fillable = [
        'id',
        'invoice_body_id',
        'transaction_id',
        'attachment_type',
        'attachment_name',
        'file',
    ];
}

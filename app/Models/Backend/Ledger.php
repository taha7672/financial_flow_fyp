<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class Ledger extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = [
        'party_id',
        'party_type',
        'invoice_id',
        'type',
        'narration',
        'credit',
        'debit',
        'created_date',
        'created_by',
        'status',
    ];

    // function to customerLedger that create with using createLedger
    public static function customerLedger( $client_id,$customer_id,  $invoice_id, $type, $narration, $credit, $debit)
    {
        // party_type
        $party_type = 'Customer';

        $ledger = self::createLedger( $client_id,$customer_id,$party_type, $invoice_id, $type, $narration, $credit, $debit);
        return $ledger;
    }
    public static function clientLedger( $client_id,$customer_id, $invoice_id, $type, $narration, $credit, $debit)
    {
        // party_type
        $party_type = 'Client';
        $ledger = self::createLedger( $client_id,$customer_id,$party_type,$invoice_id,$type, $narration, $credit, $debit);
        return $ledger;
    }



    // function to two create ledger 

    public static function createLedger( $client_id,$customer_id,$party_type,$invoice_id, $type, $narration, $credit, $debit)
    {
        $ledger = new Ledger();
        $ledger->client_id = $client_id;
        $ledger->customer_id = $customer_id;
        $ledger->party_type = $party_type;
        $ledger->invoice_id = $invoice_id;
        $ledger->type = $type;
        $ledger->narration = $narration;
        $ledger->credit = $credit;
        $ledger->debit = $debit;
        $ledger->created_date =  Carbon::now();
        $ledger->created_by = auth()->user()->id;
        $ledger->save();
        return $ledger;
    }
    // ladger has many to one relation with customer local key party_id 
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    
    // ladger hasmany to one relation with client local key party_id when party_type is Client
    public function client()
    {
        return $this->belongsTo('App\Models\User', 'client_id', 'id');
    }
    // ladger has one to many relation with invoice
    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'invoice_id', 'id');
    }
   

}

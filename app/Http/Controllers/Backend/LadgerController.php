<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Ledger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LadgerController extends Controller
{
    public function index()
    {
        // get ladger where party_type is customer  
        $ledgers= Ledger::where('party_type', 'Customer')->with('customer','client', 'invoice')->get();
       
        return view('Backend.pages.ladgers.index', compact('ledgers'));
    }
    // getLedgers
    public function getLadgers(Request $request)
    {

        $ladgers = Ledger::groupBy('v_id')->get();
       $table= view('Backend.pages.ladgers.listing_table', compact('ladgers'))->render();
       echo json_encode($table);
    }
}


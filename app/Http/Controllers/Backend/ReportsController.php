<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Elibyy\TCPDF\Facades\TCPDF;
use Illuminate\Support\Facades\Storage;
use App\Models\Backend\Ledger;
use Illuminate\Support\Facades\File;
// use TCPDF;

class ReportsController extends Controller
{
    public function index()
    {
        return view('Backend.pages.reports.index');
    }
    public function PDF(Request $request)
    {
        // dd('controller');
        $report_type = $request->report_type;
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        if($report_type == 'ByClient'){
            $ledgers= Ledger::where('party_type', 'Client')->with('customer','client', 'invoice');
        }
      if($report_type == 'ByCustomer'){
            $ledgers= Ledger::where('party_type', 'Customer')->with('customer','client', 'invoice');
        }
        if ($start_date != ''  || $end_date != ''){
            $ledgers->whereBetween('created_at', [$start_date, $end_date]);

        }
        $ledgers = $ledgers->get();
        $title = "Payment Ledger";
        $content = view('Backend.pages.reports.pdf', compact('title', 'ledgers'))->render();
        // $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf::SetFont('Times', '', 11, '', false);
        $pdf::SetTitle($title);
        $pdf::setPrintHeader(false);
        $pdf::setFooterCallback(function ($pdf) {
            // Position at 15 mm from bottom
            $pdf->SetY(-15);
            // Set font
            $pdf->SetFont('helvetica', 'I', 8);
            // Page number
            $pdf->Cell(0, 10, 'Page ' . $pdf->getAliasNumPage() . '/' . $pdf->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
        });
        $pdf::AddPage('P', "A4");
        $pdf::writeHTML($content, true, false, true, false, '');

        deleteAllStoragePDFs();

        $pdf::Output(storage_path('app/public/pdf/' . $title . '.pdf'), 'F');


    return  $path = 'storage/pdf/' . $title . '.pdf';
   
    }
}

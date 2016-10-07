<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\PDF;

class PDFController extends Controller
{
    public function getPDF()
    {
        $pdf=PDF::loadView('pdf.customer');
        return $pdf->download('customer.pdf');
        //return $pdf->stream('customer.pdf');
    }

}

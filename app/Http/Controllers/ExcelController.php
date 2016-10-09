<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Maatwebsite\Excel\Facades\Excel;
use App\Content;
use App\Month;


class ExcelController extends Controller
{
    public function getImport()
    {
        return view('excel.importCustomer');
    }

    public function postImport()
    {
        Excel::load(Input::file('customer'),function($reader){
           $reader->each(function($sheet){
               Customer::firstOrCreate($sheet->toArray());
           });
        });
    }

    public function getExport()
    {

        $export=Content::all();
        Excel::create('Export Customer', function($excel) use($export){
            $excel->sheet('Sheet 1', function($sheet) use($export){
                $sheet->fromArray($export);
            });
        })->export('xlsx');
    }
}

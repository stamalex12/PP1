<?php

namespace App\Http\Controllers;

use App\Donation;
use App\Expense;
use Maatwebsite\Excel\Facades\Excel;
use App\ResourceNeed;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class ReportController extends Controller
{
    public function generateReport()
    {
        $resource = ResourceNeed::all();
        $reportDetails = DB::select("select coalesce(SUM(Income),0) as Income, coalesce(SUM(Expense),0) as Expense, ResourceNeed, MonthName, YearDate
                                FROM (
                                    select coalesce(SUM(d.amount),0) as income, 0 as expense, d.resourceNeed, 
                                    MONTH(d.created_at) As MonthName, DATE_FORMAT(d.created_at,'%Y') AS YearDate
                                    from donations d
                                    group by d.ResourceNeed, YearDate, MONTH(d.created_at)
                                
                                    union 
                                    
                                    select 0 as income, coalesce(SUM(e.amount),0) as expense, e.resourceNeed, 
                                    MONTH(e.created_at) As MonthName, DATE_FORMAT(e.created_at,'%Y') AS YearDate
                                    from expenses e
                                    group by e.ResourceNeed, YearDate, MONTH(e.created_at)
                                ) AS SourceData
                                group by resourceNeed, YearDate, MonthName
                                order by YearDate, MonthName ASC");
        return view('reports.index', compact('resource', 'months', 'reportDetails'));
    }

    public function generateIncomeExpensesReport()
    {
        $income = Donation::orderBy('created_at', 'ASC')->get();
        $expense = Expense::orderBy('created_at', 'ASC')->get();
        return view('reports.index-IE', compact('income', 'expense'));
    }

    public function getIEExport()
    {
        $income = Donation::orderBy('created_at', 'ASC')->get();
        $expense = Expense::orderBy('created_at', 'ASC')->get();
        $date = date("Y-m-d hisa");
        $filename = $date . " Income/Expense Report";

        Excel::create($filename, function($excel) use($income, $expense) {
            $excel->sheet('New sheet', function($sheet) use($income, $expense) {
                $sheet->loadView('reports.excel-IE')->with('income', $income )->with('expense', $expense);
            })->export('xlsx');
        });
    }

    public function getMExport()
    {
        $resource = ResourceNeed::all();
        $reportDetails = DB::select("select coalesce(SUM(Income),0) as Income, coalesce(SUM(Expense),0) as Expense, ResourceNeed, MonthName, YearDate
                                FROM (
                                    select coalesce(SUM(d.amount),0) as income, 0 as expense, d.resourceNeed, 
                                    MONTH(d.created_at) As MonthName, DATE_FORMAT(d.created_at,'%Y') AS YearDate
                                    from donations d
                                    group by d.ResourceNeed, YearDate, MONTH(d.created_at)
                                
                                    union 
                                    
                                    select 0 as income, coalesce(SUM(e.amount),0) as expense, e.resourceNeed, 
                                    MONTH(e.created_at) As MonthName, DATE_FORMAT(e.created_at,'%Y') AS YearDate
                                    from expenses e
                                    group by e.ResourceNeed, YearDate, MONTH(e.created_at)
                                ) AS SourceData
                                group by resourceNeed, YearDate, MonthName
                                order by YearDate, MonthName ASC");
        $date = date("Y-m-d h:i:sa");
        $filename = $date . " Monthly Report";

        Excel::create($filename, function($excel) use($reportDetails, $resource) {
            $excel->sheet('New sheet', function($sheet) use($reportDetails, $resource) {
                $sheet->loadView('reports.excel-M')->with('reportDetails', $reportDetails)->with('resource', $resource);
            })->export('xlsx');
        });
    }

    public function getMPDF()
    {
        $resource = ResourceNeed::all();
        $reportDetails = DB::select("select coalesce(SUM(Income),0) as Income, coalesce(SUM(Expense),0) as Expense, ResourceNeed, MonthName, YearDate
                                FROM (
                                    select coalesce(SUM(d.amount),0) as income, 0 as expense, d.resourceNeed, 
                                    MONTH(d.created_at) As MonthName, DATE_FORMAT(d.created_at,'%Y') AS YearDate
                                    from donations d
                                    group by d.ResourceNeed, YearDate, MONTH(d.created_at)
                                
                                    union 
                                    
                                    select 0 as income, coalesce(SUM(e.amount),0) as expense, e.resourceNeed, 
                                    MONTH(e.created_at) As MonthName, DATE_FORMAT(e.created_at,'%Y') AS YearDate
                                    from expenses e
                                    group by e.ResourceNeed, YearDate, MONTH(e.created_at)
                                ) AS SourceData
                                group by resourceNeed, YearDate, MonthName
                                order by YearDate, MonthName ASC");
        $pdf=PDF::loadView('reports.pdf-M', array('resource'=>$resource), array('reportDetails'=>$reportDetails));
        return $pdf->stream('pdf-M.pdf');
    }

    public function getIEPDF()
    {
        $income = Donation::orderBy('created_at', 'ASC')->get();
        $expense = Expense::orderBy('created_at', 'ASC')->get();
        $pdf=PDF::loadView('reports.pdf-IE', array('income'=>$income), array('expense'=>$expense));
        return $pdf->stream('pdf-IE.pdf');
    }
}

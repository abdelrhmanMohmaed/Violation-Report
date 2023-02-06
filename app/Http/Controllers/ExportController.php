<?php

namespace App\Http\Controllers;

use App\Exports\OpenExport;
use App\Exports\OverDueExport;
use App\Exports\ReportExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    // public function export()
    // {
    //     return Excel::download(new ReportExport, 'report.xlsx');
    // }
    public function exportOverDue()
    {
        return Excel::download(new OverDueExport, 'overDue.xlsx');
    }
    public function exportOpenReport()
    {
        return Excel::download(new OpenExport, 'Open.xlsx');
    }
}

<?php

namespace App\Exports;

use App\Models\Report;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ReportExport implements FromView 
{
    public $reports;

    public function __construct(protected $from, protected $to)
    {
        $this->from = $from;
        $this->to = $to;
        $this->reports = Report::where('created_at', '>=', date('Y-m-d 00:00:00', strtotime($this->from)))
            ->where('created_at', '<=', date('Y-m-d 00:00:00',  strtotime($this->to)))->get();
    }


    public function view(): View
    {
        $reports = $this->reports;
        return view('exports.export', compact('reports'));
    }
    
}

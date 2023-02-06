<?php

namespace App\Exports;

use App\Models\Report;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class OpenExport implements FromView
{
    public function view(): View
    {
        return view('exports.allReport', [
            'reports' => Report::where('status', 0)->get()
        ]);
    }
}

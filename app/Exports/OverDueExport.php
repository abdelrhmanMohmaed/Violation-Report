<?php

namespace App\Exports;

use App\Models\Report;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class OverDueExport implements FromView
{
    public function view(): View
    {
        return view('exports.allReport', [
            'reports' => Report::where('target_Date', '<', Carbon::now()->startOfDay())
                ->where('status', 0)->get()
        ]);
    }
}

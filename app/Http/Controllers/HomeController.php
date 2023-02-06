<?php

namespace App\Http\Controllers;

use App\Events\ReportAdded;
use App\Http\Requests\ReportRequest;
use App\Models\Area;
use App\Models\Category;
use App\Models\Principal;
use App\Models\Report;
use App\Models\Seel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

use App\Exports\ReportExport;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    public function index()
    {
        $seels = Seel::get();
        $areas = Area::get();
        $cats = Category::get();
        $principals = Principal::get();
        $reports = Report::orderBy('id', 'DESC')->first();
        return view('web.home', compact([
            'reports', 'seels', 'areas', 'cats', 'principals'
        ]));
    }

    public function show()
    {
        $reports = Report::orderBy('id', 'DESC')
            ->where('target_Date', '>=', Carbon::now()->startOfDay())
            ->where('status', 0)->get();
        return view('web.show', compact('reports'));
    }

    public function store(ReportRequest $request)
    {
        if ($request->has('img')) {
            $path = 'uploads/reports-img/';
            $filePath = uploadImage($path, $request->img);
        }
        try {
            Report::create([
                'seel_id' => $request->seel_id,
                'area_id' => $request->area_id,
                'category_id' => $request->category_id,
                'description' => $request->description,
                'recommended_action' => $request->recommended_action,
                'receipt_confirmation' =>  0,
                'target_Date' => $request->target_Date,
                'img' => $filePath ?? null,
                'principal_id' => $request->principal_id,
                'reported_by' => Auth::user()->name,
            ]);

            Alert::success('Report Added successfully');
            return redirect()->route('report.home');
        } catch (\Exception $e) {
            // return $e;
            Alert::error('Something is wrong please try again!!');
            return redirect()->route('report.home');
        }
    }

    public function edit(Report $report)
    {
        $seels = Seel::get();
        $areas = Area::get();
        $cats = Category::get();
        $principals = Principal::get();

        return view('web.edit', compact([
            'report', 'seels', 'areas', 'cats', 'principals'
        ]));
    }

    public function update(ReportRequest $request)
    {
        ($request->img) ? $path = $request->img : $path = Report::find($request->id)['img'];
        if ($request->has('img')) {
            $path = 'uploads/reports-img/';
            File::delete($path);
            $filePath = uploadImage($path, $request->img);
        }
        try {
            Report::find($request->id)->update([
                'seel_id' => $request->seel_id,
                'area_id' => $request->area_id,
                'category_id' => $request->category_id,
                'description' => $request->description,
                'recommended_action' => $request->recommended_action,
                'target_Date' => $request->target_Date,
                'img' => $filePath ?? $path,
                'principal_id' => $request->principal_id,
                'reported_by' => Auth::user()->name,
            ]);
            Alert::success('Report Updated successfully');
            return redirect()->route('report.show');
        } catch (\Exception $e) {
            Alert::error('Something is wrong please try again!!');
            return redirect()->route('report.home');
        }
    }

    public function confirm(Report $report)
    {
        $report->update([
            'receipt_confirmation' => !$report->receipt_confirmation
        ]);
        event(new ReportAdded($report));
        Alert::success('The report has been confirmed and the mail has been sent');
        return back();
    }

    public function close(Report $report)
    {
        try {
            $report->update([
                'status' => !$report->status
            ]);
            event(new ReportAdded($report));
            Alert::success('The report has been closed and the mail sent');
            return back();
        } catch (\Exception $e) {
            Alert::error('Something is wrong please try again!!');
            return redirect()->back();
        }
    }

    public function delete(Request $request)
    {
        try {
            $report = Report::find($request->report_id);
            if (@$report->img) {
                File::delete($report->img);
            };
            $report->delete();
            Alert::success('Report Deleted successfully');
            return back();
        } catch (\Exception $e) {
            // return $e;
            Alert::error('Something is wrong please try again!!');
            return redirect()->back();
        }
    }

    public function overdue()
    {
        $reports = Report::where('status', 0)
            ->where('target_Date', '<', Carbon::now()->startOfDay())
            ->orderBy('id', 'DESC')->get();
        return view('web.overdue', compact('reports'));
    }

    public function export(Request $request)
    {
        return view('exports.index');
    }

    public function export_details(Request $request)
    {
        $this->validate($request, [
            'from' => ['required', 'date'],
            'to' => ['required', 'date','after:from'],
        ]);

        $from = $request->from;
        $to = $request->to;
        return Excel::download(new ReportExport($from, $to), 'report.xlsx');
    }
}

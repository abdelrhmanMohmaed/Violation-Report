<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Principal;
use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    // start show all reborts in view 
    public function show()
    {
        $data['reborts'] = Report::orderBy('id', 'DESC')->get();
        return view('web.home.show')->with($data);
    }
    // end show all reborts in view
    public function search(Request $request)
    {
        $area = $request->area;
        $seel = $request->seel;

        $data['reborts'] = Report::where('area', 'LIKE', "%$area%")
            ->where('seel', 'LIKE', "%$seel%")
            ->orderBy('id', 'DESC')
            ->get();
        // dd($data['reborts']);
        return view('web.home.search')->with($data);
    }
    public function edit($id)
    {
        $data['reports'] = Report::where('id', $id)->get();
        $data['principals'] = Principal::get();

        return view('web.home.edit')->with($data);
    }
    public function update(Request $request, $id)
    {
        $report = Report::findOrFail($id);

        $path = $report->img;
        if ($request->file('image')) {
            $img_path = 'uploads/img-report/' . $path;
            File::delete($img_path);
            $img_ex =  $request->file('image')->getClientOriginalExtension();
            $path = time() . '.' . $img_ex;
            //end update img path and name 
            // start data of mail
            $img_path = 'uploads/img-report';
            $request->file('image')->move($img_path,  $path);
        };

        $pr_Id = $request->leader ?? $report->principal_id;
        $pr = Principal::findOrFail($pr_Id);

        $report->update([
            'seel' => $request->seel ?? $report->seel,
            'area' => $request->areas ?? $report->area,
            'category' => $request->cat ?? $report->category,
            'description' => $request->desc ?? $report->description,
            'recommended_action' => $request->action ?? $report->recommended_action,
            'target_Date' => $request->target_date ?? $report->target_Date,
            'img' =>  $path ?? $report->img,
            'reported_by' => Auth::user()->name . ' - ' . Auth::user()->seel_code,
            'principal_id' => $request->leader ?? $report->principal_id,
            'receipt_name' => $pr->name . " - " . $pr->seel_code ?? $report->receipt_name,
        ]);

        return redirect('/reports-list');
    }

    // start show all reborts in view 
    public function overReport()
    {
        $data['reborts'] = Report::where('status', '=', 1)
            ->where('target_Date', '<', Carbon::now()->startOfDay())
            ->orderBy('id', 'DESC')->get();

        return view('web.home.overDue')->with($data);
    }
    // end show all reborts in view
}

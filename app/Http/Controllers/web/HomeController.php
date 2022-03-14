<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Requests\report\StoreValidtionRequest;
use App\Mail\notification\MailReport;
use App\Models\Principal;
use Illuminate\Http\Request;
use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        $data['reports'] = Report::orderBy('id', 'DESC')->first();
        $data['principals'] = Principal::get();
        // dd($data['reports']);
        return view('web.home.index')->with($data);
    }

    public function store(StoreValidtionRequest $request)
    {
        //start validation in feilds 
        $request->validated();
        //end validation in feilds
        //start update img path and name 
        if ($request->file('image')) {
            $img_ex =  $request->file('image')->getClientOriginalExtension();
            $img_name = time() . '.' . $img_ex;
            //end update img path and name 
            // start data of mail
            $img_path = 'uploads/img-report';
            $request->file('image')->move($img_path, $img_name);
        }

        $pr_Id = $request->input('leader');
        $pr = Principal::findOrFail($pr_Id);

        Report::create([
            'seel' => $request->input('seel'),
            'area' => $request->input('areas'),
            'category' => $request->input('cat'),
            'description' => $request->input('desc'),
            'recommended_action' => $request->input('action'),
            'target_Date' => $request->input('target_date'),
            // 'receipt_confirmation' => $request->input('receipt_confirmation'),
            // 'receipt_confirmation' => 'No',
            'img' => $img_name ?? null,
            'reported_by' => Auth::user()->name . ' - ' . Auth::user()->seel_code,
            'principal_id' => $request->input('leader'),
            'receipt_name' => $pr->name . " - " . $pr->seel_code,
        ]);
        return back()->with('success', 'Report has been successfully uploaded in Report List');
    }

    public function ex()
    {
        $reports = Report::where('status', '=', true)->orderBy('id', 'DESC')->get();

        header('Content-Type: application/xls');
        header('Content-Disposition: atttachment; filename=data.xls');
        // echo 'gggg';

        $excel  = "";

        if (count($reports) > 0) {
            $excel .= '
            <table style="border-collapse: collapse; font-family: arial, sans-serif;">
            <thead>
                <tr>
                    <th style="border: 1px solid #000;text-align: left;padding: 8px; background-color:rgb(250, 202, 202)">Seel</th>
                    <th style="border: 1px solid #000;text-align: left;padding: 8px; background-color:rgb(250, 202, 202)">Area</th>
                    <th style="border: 1px solid #000;text-align: left;padding: 8px; background-color:rgb(250, 202, 202)">Category</th>
                    <th style="border: 1px solid #000;text-align: left;padding: 8px; background-color:rgb(250, 202, 202)">Description</th>
                    <th style="border: 1px solid #000;text-align: left;padding: 8px; background-color:rgb(250, 202, 202)">Recommended Action</th> 
                    <th style="border: 1px solid #000;text-align: left;padding: 8px; background-color:rgb(250, 202, 202)">Target Date</th>
                    <th style="border: 1px solid #000;text-align: left;padding: 8px; background-color:rgb(250, 202, 202)">Created at</th>
                    <th style="border: 1px solid #000;text-align: left;padding: 8px; background-color:rgb(250, 202, 202)">Receipt Name</th> 
                    <th style="border: 1px solid #000;text-align: left;padding: 8px; background-color:rgb(250, 202, 202)">Photo</th> 
                </tr>
    
            </thead>
        
        
            <tbody>';
            foreach ($reports as $report) {
                $excel .= '<tr>
                    <td  style="border: 1px solid #000;text-align: left;padding: 8px; background-color:#ddd">' . $report->seel . '</td>
                    <td  style="border: 1px solid #000;text-align: left;padding: 8px; background-color:#ddd">' . $report->area . '</td>
                    <td  style="border: 1px solid #000;text-align: left;padding: 8px; background-color:#ddd">' . $report->category . '</td>
                    <td  style="border: 1px solid #000;text-align: left;padding: 8px; background-color:#ddd">' . $report->description . '</td>
                    <td  style="border: 1px solid #000;text-align: left;padding: 8px; background-color:#ddd">' . $report->recommended_action . '</td> 
                    <td  style="border: 1px solid #000;text-align: left;padding: 8px; background-color:#ddd">' . $report->target_Date . '</td>
                    <td  style="border: 1px solid #000;text-align: left;padding: 8px; background-color:#ddd">' . $report->created_at . '</td>
                    <td  style="border: 1px solid #000;text-align: left;padding: 8px; background-color:#ddd">' . $report->receipt_name . '</td> 
                    <td  style="border: 1px solid #000;text-align: left;padding: 8px; background-color:#ddd">';
                if ($report->img != null) {
                    $excel .= ' <a href="http://10.108.22.61/Violation-Report/public/uploads/img-report/' . $report->img . '">Image</a>';
                } else {
                    $excel .= 'No Image';
                }
                $excel .= '</td> 
                </tr>';
            };
            $excel .= '</tbody>
        </table>';
        }
        echo $excel;
    }
}

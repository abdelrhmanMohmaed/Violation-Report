<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\notification\MailReport;
use App\Models\Principal;
use App\Models\Report;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;

class AdminController extends Controller
{
    // start toggle report in active in not active 
    public function toggleConfirm(Request $request, $id)
    {
        $report = Report::findOrFail($id);

        $pr_Id = $report->principal_id;
        $pr = Principal::findOrFail($pr_Id);
        $pr_Email = $pr->email;
        // dd($pr_Email);
        if ($report->img == null) {
            $image = null;
        } else {
            $img_path = 'uploads/img-report/';
            $image = $img_path . $report->img;
        }

        $data = ([
            'seel' => $report->seel,
            'area' => $report->area,
            'category' => $report->category,
            'description' => $report->description,
            'recommended_action' => $report->recommended_action,
            'target_Date' => $report->target_Date,
            // 'receipt_confirmation' => $report->receipt_confirmation,
            'email' => $pr_Email,
            'image' =>  $image,
            'receipt_name' => $pr->name . " - " . $pr->seel_code,
            'created_at' =>  $report->created_at,
        ]);
        Mail::send(new MailReport($data));
        // end data of mail
        $report->update([
            'receipt_confirmation' => !$report->receipt_confirmation
        ]);

        return back()->with('success', 'Report has been successfully confirmed ,Done notification sent');
    }
    // start toggle report in active in not active 
    public function toggle($id)
    {
        $report = Report::findOrFail($id);
        $report->update([
            'status' => !$report->status
        ]);
        return back();
    }
    // end toggle report in active in not active 
    // start delete report in admin 
    public function delete($id)
    {
        $report = Report::findOrFail($id);
        $img_path = 'uploads/img-report/' . $report->img;
        if (File::exists($img_path)) {
            File::delete($img_path);
        };
        $report->delete();
        return back();
    }
    // end delete report in admin 
}

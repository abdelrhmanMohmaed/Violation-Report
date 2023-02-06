<?php

namespace App\Listeners;

use App\Events\ReportAdded;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class Reports
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        // $authMail = [Auth::user()->email, 'EhabMahmoud.Saeed@samaya-electronics.com'];
        $created_by = $event->report->created_by->email;
        $authMail = [Auth::user()->email, 'ehabmahmoud.saeed@samaya-electronics.com',$created_by];
        $principalEmail = $event->report->principal->email;

        $view = 'emails.Report';
        $data = array('event' => $event);
        Mail::send($view, $data, function ($message) use ($principalEmail, $authMail, $event) {
            ($event->report->img) ? $message->attach($event->report['img']) : "";

            if (Auth::user()->id != 1) {
                $message->to($principalEmail);
                $message->cc($authMail);
            }

            $message->bcc(['Abdelrahman.Mohamed@samaya-electronics.com','anthony.farah@samaya-electronics.com']);
            $message->subject('H&S Violation Report Notification');
            $message->from('EPD-Notifications@samaya-electronics.com','H&S Violation Report System Notification');
        });
    }
}

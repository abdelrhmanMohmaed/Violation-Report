<?php

namespace App\Mail\notification;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use SplFileInfo;

class MailReport extends Mailable
{
    use Queueable, SerializesModels;

    public $details;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $img = $this->data['image'];

        if ($img !== null) {
            $email = $this->data['email'];
            return $this->view('emails.mailFormate')
                ->attach(
                    $this->data['image']
                )
                ->subject('H&S Violation Report Notification')
                ->with('data', $this->data)
                ->to($email)
                ->cc(["ehabmahmoud.saeed@samaya-electronics.com", "abdelrahman.mohamed@samaya-electronics.com"])
                ->bcc('anthony.farah@samaya-electronics.com')
                ->from('EPD-Notifications@samaya-electronics.com', 'ENGINEERING PROGRAM DEVELOPMENT');
        } else {
            $email = $this->data['email'];
            return $this->view('emails.mailFormate')
                ->subject('H&S Violation Report Notification')
                ->with('data', $this->data)
                ->to($email)
                ->cc(["ehabmahmoud.saeed@samaya-electronics.com", "abdelrahman.mohamed@samaya-electronics.com"])
                ->bcc('anthony.farah@samaya-electronics.com')
                ->from('EPD-Notifications@samaya-electronics.com', 'ENGINEERING PROGRAM DEVELOPMENT');
        }
    }
}

<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyRequest extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    /**
     * @var
     */
    protected $kr_id;

    /**
     * @var
     */
    protected $user;

    /**
     * @var
     */
    protected $admin;

    /**
     * NotifyRequest constructor.
     * @param $kr_id
     * @param $user
     * @param $admin
     */
    public function __construct($kr_id, $user, $admin)
    {
        $this->kr_id = $kr_id;
        $this->user = $user;
        $this->admin = $admin;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $content = $this->user->name . " asks to join your Kot." ;
        $accept = URL::to('/')+"profile/accept/"+$this->kr_id;
        $decline = URL::to('/')+"profile/decline/"+$this->kr_id;

        $title = "Kot request";

        Mail::send('mail.notify', [
            'title' => $title,
            'content' => $content,
            'accept' => $accept,
            'decline' => $decline
        ],
            function ($message)
            {
                $message->from('messagesystem@kvdt.be');
                $message->subject('Acceptence kot');
                $message->to($this->admin->email);
            });

        return response()->json(['message' => 'mail completed']);
    }
}

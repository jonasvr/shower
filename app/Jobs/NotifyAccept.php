<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyAccept extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    /**
     * @var
     */
    protected $user;

    /**
     * @var
     */
    protected $koten;

    /**
     * @var
     */
    protected $accept;
    /**
     * NotifyAccept constructor.
     * @param $user
     * @param $kot
     * @param $accept
     */
    public function __construct($user, $kot, $accept)
    {
        $this->user = $user;
        $this->koten = $kot;
        $this->accept = $accept;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $content = " Your request for " . $this->koten . " has been denied";
        $title = "Kot request";
        if($this->accept){
            $content = " Your request for " . $this->koten . " has been accepted";
            $title  = 'Acceptence kot';
        }

        Mail::send('mail.send', [
            'title' => $title,
            'content' => $content
        ],
            function ($message)
            {
                $message->from('messagesystem@kvdt.be');
                $message->subject('Acceptence kot');
                $message->to($this->user->email);
            });

        return response()->json(['message' => 'mail completed']);
    }
}

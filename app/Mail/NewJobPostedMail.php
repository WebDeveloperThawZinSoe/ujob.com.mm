<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewJobPostedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $job;

    public function __construct($job)
    {
        $this->job = $job;
    }

    public function build()
    {
        return $this->subject('New Job in Your Preferred Category!')
                    ->view('emails.new_job_posted')
                    ->with([
                        'jobTitle' => $this->job->title,
                        'categoryName' => $this->job->category->name,
                        'link' => 'https://ujob.com.mm/login',
                    ]);
    }
}

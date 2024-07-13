<?php

namespace App\Jobs;

use App\Mail\NotificationMail;
use App\Services\SSLWirelessSMSService;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        protected array   $recipient,
        protected string  $subject,
        protected string  $message,
        protected ?string $attachment = null,
    ){

    }

    /**
     * Execute the job.
     *
     * @param SSLWirelessSMSService $SSLWirelessSMSService
     * @return void
     * @throws GuzzleException
     */
    public function handle(SSLWirelessSMSService $SSLWirelessSMSService): void
    {
        // Send email
        Mail::to($this->recipient['email'])->send(new NotificationMail($this->subject, $this->message, $this->attachment));

        // Send SMS
        $SSLWirelessSMSService->sendSMS($this->recipient['phone'], $this->message);
    }
}

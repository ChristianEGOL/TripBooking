<?php

namespace EGOL\ReisenLizenzPayment\Jobs;

use Mail;
use App\Jobs\Job;
use Carbon\Carbon;
use EGOL\ReisenLizenzPayment\PaymentReminder;
use Illuminate\Contracts\Bus\SelfHandling;

class PaymentReminderJob extends Job implements SelfHandling
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $reminders = PaymentReminder::today()->notsent()->get();
        if ($reminders->count()) {
            foreach($reminders as $reminder) {

                $data = [
                    'title' => $reminder->title,
                    'lead' => $reminder->message
                ];

                Mail::send('booking::emails.reminder', $data, function ($message) use ($reminder) {
                    $message->from('info@kulturtours.de');
                    $message->to($reminder->email);
                    $message->subject('Erinnerungsmail');
                });

                $reminder->shipment_at = Carbon::now();
                $reminder->save();
            }
            sleep(3);
        }
    }
}

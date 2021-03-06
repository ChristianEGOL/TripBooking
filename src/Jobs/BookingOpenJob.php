<?php

namespace EGOL\ReisenLizenzPayment\Jobs;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Database\Eloquent\Collection;

class BookingOpenJob extends Job implements SelfHandling
{
    /**
     * @var Collection
     */
    private $bookings;

    /**
     * Create a new job instance.
     *
     * @param Collection $bookings
     */
    public function __construct(Collection $bookings)
    {
        $this->bookings = $bookings;
    }

    /**
     * Execute the job.
     *
     * @return Collection
     */
    public function handle()
    {
        return $this->bookings->filter(function($booking) {
            $value = 0;
            $payed = 0;

            foreach($booking->customer_booking as $customer) {
                if($customer->price) {
                    $value += $customer->price->price;                    
                }
            }

            foreach($booking->payment as $payment) {
                $payed += $payment->value;
            }

            if($payed && $value > $payed) {
                return true;
            }

            return false;
        })->sortByDesc('id');
    }
}

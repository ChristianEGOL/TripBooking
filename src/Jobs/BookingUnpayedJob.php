<?php

namespace EGOL\ReisenLizenzPayment\Jobs;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Database\Eloquent\Collection;

class BookingUnpayedJob extends Job implements SelfHandling
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
            return !$booking->payment->count() ? true : false;
        })->sortByDesc('id');
    }
}

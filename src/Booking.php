<?php


namespace EGOL\TripBooking;


class Booking extends \App\Booking
{

    public function payment()
    {
        return $this->hasMany('EGOL\TripBooking\PaymentHistory');
    }

    public function reminder()
    {
        return $this->hasMany('EGOL\TripBooking\PaymentReminder');
    }

}

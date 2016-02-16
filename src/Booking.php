<?php


namespace EGOL\ReisenLizenzPayment;


class Booking extends \App\Booking
{

    public function payment()
    {
        return $this->hasMany('EGOL\ReisenLizenzPayment\PaymentHistory');
    }

    public function reminder()
    {
        return $this->hasMany('EGOL\ReisenLizenzPayment\PaymentReminder');
    }

}

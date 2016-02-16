<?php

namespace EGOL\TripBooking;

use Illuminate\Database\Eloquent\Model;

class PaymentReminder extends Model
{
    protected $fillable = ['booking_id', 'title', 'message', 'send_at'];
}

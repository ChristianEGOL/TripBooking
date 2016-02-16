<?php

namespace EGOL\ReisenLizenzPayment;

use Illuminate\Database\Eloquent\Model;

class PaymentHistory extends Model
{
    protected $fillable = ['customer_id', 'booking_id', 'value', 'description'];
}

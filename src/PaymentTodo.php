<?php

namespace EGOL\ReisenLizenzPayment;

use Illuminate\Database\Eloquent\Model;

class PaymentTodo extends Model
{
    protected $fillable = ['name', 'booking_id', 'done'];
}

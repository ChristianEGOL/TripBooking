<?php

namespace EGOL\ReisenLizenzPayment;

use Illuminate\Database\Eloquent\Model;

class PaymentDefaultReminder extends Model
{
    protected $fillable = ['days', 'title', 'email', 'message'];
}

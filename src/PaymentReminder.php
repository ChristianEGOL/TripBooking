<?php

namespace EGOL\ReisenLizenzPayment;

use Illuminate\Database\Eloquent\Model;

class PaymentReminder extends Model
{
    protected $fillable = ['booking_id', 'title', 'message', 'send_at', 'email'];

    protected $dates = ['send_at'];

    public function scopeToday($query)
    {
        return $query->whereRaw('DATE(NOW()) = DATE(send_at)');
    }

    public function scopeNotsent($query)
    {
        return $query->where('shipment_at', '0000-00-00');
    }
}

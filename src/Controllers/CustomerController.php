<?php


namespace EGOL\TripBooking\Controllers;

use App\CustomerBooking;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CustomerController extends \App\Http\Controllers\CustomerController
{
    public function patchCustomerPayed(Request $request, $id, $customer) {
        CustomerBooking::where('booking_id', $id)
            ->where('customer_id', $customer)
            ->update(['payed' => 1, 'payed_at' => Carbon::now()]);

        return response()->json(['customer' => $customer]);
    }
}

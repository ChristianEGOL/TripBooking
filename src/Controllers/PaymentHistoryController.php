<?php

namespace EGOL\TripBooking\Controllers;

use App\Customer;
use App\CustomerBooking;
use EGOL\TripBooking\PaymentHistory;
use EGOL\TripBooking\Requests\CreatePaymentHistoryRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * Class PaymentHistoryController
 * @package EGOL\TripBooking\Controllers
 */
class PaymentHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePaymentHistoryRequest $request, $id)
    {
        $value = str_replace(',', '.', $request->get('value'));

        $payment = PaymentHistory::create([
            'value' => $value,
            'description' => $request->get('description'),
            'booking_id' => $id,
            'customer_id' => $request->get('customer')
        ]);

        return response()->json($payment);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $history)
    {
        $history = PaymentHistory::findOrFail($history);
        $customer_id = $history->customer_id;

        if($customer_id) {
            CustomerBooking::where('booking_id', $id)
                ->where('customer_id', $history->customer_id)
                ->update(['payed' => 0, 'payed_at' => '0000-00-00 00:00:00']);
        }

        $history->delete();
        return response()->json(['status' => 'ok', 'remove' => $customer_id]);
    }
}

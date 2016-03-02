<?php

namespace EGOL\ReisenLizenzPayment\Controllers;

use EGOL\ReisenLizenzPayment\Booking;
use EGOL\ReisenLizenzPayment\Jobs\BookingOpenJob;
use EGOL\ReisenLizenzPayment\Jobs\BookingPayedJob;
use EGOL\ReisenLizenzPayment\Jobs\BookingUnpayedJob;
use Illuminate\Http\Request;

use App\Http\Requests;
use URL;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $showError = 0;

        if ($request->old('error')) {
            $showError = 1;
        }

        $bookings = Booking::with('customer_booking.price', 'tripdate', 'payment')
            ->orderBy('id', 'desc')
            ->get();

        $open = $this->dispatch(new BookingOpenJob($bookings));

        $done = $this->dispatch(new BookingPayedJob($bookings));

        $unpayed = $this->dispatch(new BookingUnpayedJob($bookings));

        return view('booking::payment.index')
            ->withBookings($bookings)
            ->with('openBookings', $open)
            ->with('doneBookings', $done)
            ->with('unpayedBookings', $unpayed)
            ->with('showError', $showError);
    }

    public function transform(Request $request, $id)
    {
        $booking = Booking::find($id);
        $booking->typ = 'booking';
        $booking->save();
    }

    public function postSearch(Request $request)
    {
        $booking = Booking::find($request->get('booking_id'));

        if ($booking) {
            return redirect()->to('/payment/' . $request->get('booking_id') . '/edit');
        }

        return redirect()->to(URL::previous())
            ->withInput(['error' => "Hello"]);
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $booking = Booking::with(['todo', 'reminder', 'tripdate', 'payment', 'trip.reseller', 'customer_booking' => function($query) {
            $query->where('trip_date_price_id', '>', 0);
        }, 'customer_booking.customers', 'customer_booking.price.date'])->find($id);

        if ($request->ajax()) {
            return response()->json($booking);
        }

        return view('booking::payment.show')
            ->withBooking($booking);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('booking::payment.edit')
            ->withId($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function patchComment(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        $booking->comment = $request->get('comment');
        $booking->save();

        return response()->json(['status' => 'ok']);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

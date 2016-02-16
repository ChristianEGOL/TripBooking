<?php

namespace EGOL\ReisenLizenzPayment\Controllers;

use Carbon\Carbon;
use EGOL\ReisenLizenzPayment\Jobs\PaymentReminderJob;
use EGOL\ReisenLizenzPayment\PaymentReminder;
use EGOL\ReisenLizenzPayment\Requests\CreatePaymentReminderRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * Class PaymentReminderController
 * @package EGOL\ReisenLizenzPayment\Controllers
 */
class PaymentReminderController extends Controller
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
     * @param CreatePaymentReminderRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreatePaymentReminderRequest $request, $id)
    {
        $send_at = Carbon::createFromFormat('d.m.Y', $request->get('send_at'));

        $reminder = PaymentReminder::create([
            'booking_id' => $id,
            'email' => $request->get('email'),
            'title' => $request->get('title'),
            'message' => $request->get('message'),
            'send_at' => $send_at
        ]);

        return response()->json(['status' => 'ok', 'booking' => $reminder]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function cronjob(Request $request)
    {
        $this->dispatch(new PaymentReminderJob());
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
        echo $id;
        return response()->json(['status' => 'ok']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $reminder)
    {
        PaymentReminder::find($reminder)->delete();
    }
}

<?php


namespace EGOL\ReisenLizenzPayment\Controllers;


use App\Http\Controllers\Controller;
use EGOL\ReisenLizenzPayment\PaymentDefaultReminder;
use EGOL\ReisenLizenzPayment\Requests\CreateDefaultReminderRequest;
use Faker\Provider\Payment;
use Illuminate\Http\Request;

class PaymentDefaultReminderController extends Controller
{
    public function index(Request $request) {

        if($request->ajax()) {
            $reminders = PaymentDefaultReminder::all();

            return response()->json($reminders);
        }

    }

    public function store(CreateDefaultReminderRequest $request)
    {
        PaymentDefaultReminder::create($request->all());

        return redirect()->to('/payment/settings');
    }

    public function edit($id)
    {
        $reminder = PaymentDefaultReminder::findOrFail($id);

        return view('booking::reminder.edit', compact('reminder'));
    }

    public function update(CreateDefaultReminderRequest $request, $id)
    {
        PaymentDefaultReminder::findOrFail($id)->update($request->all());

        return redirect()->to('/payment/settings');
    }

    public function destroy($id)
    {
        PaymentDefaultReminder::findOrFail($id)->delete();

        return redirect()->to('/payment/settings');
    }
}

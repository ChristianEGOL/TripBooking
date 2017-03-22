<?php

namespace EGOL\ReisenLizenzPayment\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use EGOL\ReisenLizenzPayment\PaymentTodo;
use EGOL\ReisenLizenzPayment\Requests\CreateTodoRequest;

class PaymentTodoController extends Controller
{
    /**
     * @param CreateTodoRequest|Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateTodoRequest $request, $id)
    {
        $todo = PaymentTodo::create([
            'booking_id' => $id,
            'name' => $request->get('name'),
            'done' => 0
        ]);

        return response()->json($todo);
    }

    /**
     * @param Request $request
     * @param $id
     * @param $todo
     */
    public function update(Request $request, $id, $todo)
    {
        $todo = PaymentTodo::findOrFail($todo);
        $todo->done = $request->get('value');
        $todo->save();
    }

    /**
     * @param $id
     * @param $todo
     */
    public function destroy($id, $todo)
    {
        PaymentTodo::findOrFail($todo)->delete();
    }
}

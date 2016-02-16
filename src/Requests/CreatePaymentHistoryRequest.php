<?php

namespace EGOL\TripBooking\Requests;

use App\Http\Requests\Request;

class CreatePaymentHistoryRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'value' => 'required|regex:/(\d+)[,.]?(\d{2})?/',
            'description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'description.required' => 'Bitte geben Sie eine Art der Zahlung an.',
            'value.required' => 'Bitte geben Sie eine Betrag an.',
            'value.regex' => 'Bitte geben Sie einen korrekten Betrag an.'
        ];
    }
}

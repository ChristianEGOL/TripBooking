<?php

namespace EGOL\ReisenLizenzPayment\Requests;

use App\Http\Requests\Request;

class CreatePaymentReminderRequest extends Request
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
            'title' => 'required',
            'message' => 'required',
            'send_at' => 'required|date:d.m.Y',
            'email' => 'required|email'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Bitte geben Sie einen Titel an',
            'message.required' => 'Bitte geben Sie eine Nachricht an.',
            'send_at.required' => 'Bitte geben Sie eine Datum an.',
            'send_at.date' => 'Bitte geben Sie ein gültiges Datum an.',
            'email.required' => 'Bitte geben Sie eine E-Mail Adresse an.',
            'email.email' => 'Bitte geben Sie eine gültige E-Mail Adresse an.'
        ];
    }


}

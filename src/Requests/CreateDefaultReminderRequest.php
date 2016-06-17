<?php

namespace EGOL\ReisenLizenzPayment\Requests;

use App\Http\Requests\Request;

class CreateDefaultReminderRequest extends Request
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
            'days' => 'required|numeric',
            'email' => 'required|email',
            'title' => 'required',
            'message' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'days.required' => 'Bitte geben Sie an, wieviele Tage nach der Buchungserstellung diese Nachricht verschickt werden soll',
            'days.numeric' => 'Bitte geben Sie unter Tage eine Zahl an.',
            'email.required' => 'Bitte geben Sie einen Empfänger an.',
            'email.email' => 'Bitte geben Sie eine gültige E-Mail Adresse an.',
            'title.required' => 'Bitte geben Sie einen Titel an.',
            'message.required' => 'Bitte geben Sie eine Nachricht an.'
        ];
    }
}

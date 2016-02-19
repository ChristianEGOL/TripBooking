<?php

namespace EGOL\ReisenLizenzPayment\Requests;

use App\Http\Requests\Request;

class CreateTodoRequest extends Request
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
            'name' => 'unique:payment_todos,name,NULL,id,booking_id,'.$this->id
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => $this->request->get('name').' wurde bereits angelegt.'
        ];
    }

}

<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateApplicationRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    /**     * Determine if the user is authorized to make this request.
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
            'startDate' => 'required',
            'skillsAndQuals' => 'required',
            'email' => 'required',
            'phone' => 'required',

        ];
    }
}
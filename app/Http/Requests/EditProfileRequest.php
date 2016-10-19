<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditProfileRequest extends Request
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
            'username' => 'required|unique:users,id,'.\Auth::user()->id,
            'email' => 'required|email',
            'phone' => 'numeric',
            //TODO: Improve phone validation
            'new_password' => 'alpha_num|min:6|confirmed',
            'new_password_confirmation' => 'alpha_num|min:6',
            'image' => 'image|mimes:jpeg,bmp,png',
            'wwc' => 'file|mimes:pdf,txt,text,doc,docm,docx,jpeg,png,bmp'
        ];
    }
}

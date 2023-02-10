<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPasswordValidation extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'passwordOld' =>'required|min:6',
            'passwordNew' =>'required|min:6',
            'passwordConfirm' =>'required|min:6|same:passwordNew'
        ];
    }

    public function messages()
    {
        return [
            'passwordOld.required' =>'You need to fill your old Password!',
            'passwordNew.required' =>'You need to fill your new Password!',
            'passwordConfirm.required' =>'You need to fill your confirm password!',
            'passwordConfirm.same' =>'Your confirm password do not match your new password! '
        ];
    }
}

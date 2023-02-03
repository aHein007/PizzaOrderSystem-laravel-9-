<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Validation extends FormRequest
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
            'oldPassword' =>'required|min:6',
            'newPassword' =>'required|min:6',
            'confirmPassword'=>'required|min:6|same:newPassword'
        ];
    }

    public function messages()
    {
        return [
            'oldPassword.required' => "You need to fill the old password!",
            'newPassword.required' => "You need to fill the new password!",
            'confirmPassword.required' => "You need to fill the old password!",
            'confirmPassword.same' =>"Your password need to same with new password!"
        ];
    }
}

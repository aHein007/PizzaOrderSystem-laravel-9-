<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductValidation extends FormRequest
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
            'productName' =>'required',
            'image'=>'required|mimes:png,jpg,jpeg',
            'waitingTime' =>'required|integer',
            'productPrice' =>'required',
            'description' =>'required',
            'category'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'productName.required' => 'You need to fill the product name!',
            'image.mimes' =>'You image must be jpg,png,jpeg!',
            'productPrice.required' =>'You need to fill the price!',
            'waitingTime.required' => 'You need to fill the waitingTime!',
            'description.required' => 'You need to fill the description!',
            'category.required' => 'You need to choose the category'
        ];
    }
}

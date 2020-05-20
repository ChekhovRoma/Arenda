<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class PlaceRequest extends FormRequest
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
            'name' => 'bail|required|max:255',
            'city' => 'bail|required|max:255',
            'address' => 'bail|required|max:255',
            'floors_num' => 'bail|required|integer|min:1',
            'rooms_num' => 'bail|required|integer|min:1',
            'phone' => 'bail|required|regex:/^(\+7)[0-9]{10}$/',
            'photos[]' => 'mimes:jpeg,bmp,png'
        ];
    }

    public function messages()
    {
        return [
            'email.email'=>'sosi'
        ];
    }
}

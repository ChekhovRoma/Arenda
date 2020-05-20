<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
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
            'area' => 'bail|required|max:255',
            'price' => 'bail|required|max:255',
            'floor' => 'bail|integer|min:1',
            'photos[]' => 'mimes:jpeg,bmp,png'
        ];
    }
}

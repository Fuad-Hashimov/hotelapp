<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HotelFormsRequest extends FormRequest
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
        $rules =  [
            'name' => 'required',
            'city' => 'required',
            'country' => 'required',
        ];

        if($this->isMethod('POST')){
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg|max:2048';
        }

        else if($this->isMethod('PUT')){
            $rules['image'] = 'nullable|image|mimes:jpeg,png,jpg|max:2048';
        }

        return $rules;
    }

    public function message(){
        return [
            'name.required' => 'Adinizi Daxil edin',
            'city.required' => 'Şəhər daxil edin',
            'country.required' => 'Ölkə daxil edin',
            'image.required' => 'Rəsm daxil edin',
            'image.mimes' => 'Dogru rəsm formatı seçin (jpeg,png,jpg)',
            'image.max' => 'Rəsmin ölçüsü max - 2048',
        ];
    }
}

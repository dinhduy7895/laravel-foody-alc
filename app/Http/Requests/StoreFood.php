<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFood extends FormRequest
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
             'category_id' => 'required',
            'user_id' => 'required',
             'content' => 'required|min:15|max:2000',
             'name' => 'required|min:6|max:200',
            'image' => 'required',
         
        ];
    }
}

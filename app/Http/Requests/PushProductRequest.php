<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PushProductRequest extends FormRequest
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
            'code_product' => 'required|string|max:255',
            'name' => '',
            'quantity' =>' required|integer|between:0,500000',
            'desc' => '',
            'store_id' => 'required|integer|exists:storehouses,id'
        ];
    }
}

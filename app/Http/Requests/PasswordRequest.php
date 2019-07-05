<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CheckPassword;

class PasswordRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'oldpassword' => ['bail', 'required', 'string', new CheckPassword],
            'password' => 'required|string|min:8|confirmed'
        ];
    }
}

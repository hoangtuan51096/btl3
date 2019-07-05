<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Auth;
use Hash;

class CheckPassword implements Rule
{

    public function passes($attribute, $value)
    {
        return Hash::check($value, Auth::user()->password);
    }

    public function message()
    {
        return ':attribute sai.';
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGuestRequest extends FormRequest
{
    public function rules()
    {
        return [
            'first_name' => 'required|string|max:255|min:3',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|unique:guests,phone|max:15',
            'email' => 'nullable|email|unique:guests,email|max:255',
            'country' => 'nullable|string|max:255',
        ];
    }

    public function authorize()
    {
        return true;
    }
}

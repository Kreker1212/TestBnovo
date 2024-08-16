<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGuestRequest extends FormRequest
{
    public function rules()
    {
        return [
            'first_name' => 'sometimes|required|string|max:255',
            'last_name' => 'sometimes|required|string|max:255',
            'phone' => 'sometimes|required|string|unique:guests,phone,' . $this->route('guest') . '|max:15',
            'email' => 'nullable|email|unique:guests,email,' . $this->route('guest') . '|max:255',
            'country' => 'nullable|string|max:255',
        ];
    }

    public function authorize()
    {
        return true;
    }
}

<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'username' => 'required|min:5',
            'password' => 'required|min:8'
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Data Username Harus Di Isi',
            'username.min' => 'Data Username Minimal 5 Karakter',
            'password.required' => 'Data Password Harus Di Isi',
            'password.min' => 'Data Password Minimal 8 Karakter'
        ];
    }
}

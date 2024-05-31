<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        $userExist = $this->user ? $this->user->id : '';
        return [
            'nama' => 'required|string',
            'username' => 'required|min:5|unique:users,username,' . $userExist . ',id',  
/*             'password' => 'required|min:8',
 */            'role' => 'required|in:admin,kasir'
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Data Nama Harus Diisi',
            'nama.string' => 'Data Nama Harus Berupa String',
            'username.required' => 'Data Username Harus Di Isi',
            'username.unique' => 'Data Username Sudah Ada',
            'username.min' => 'Data Username Minimal 5 Karakter',
            /* 'password.required' => 'Data Password Harus Di Isi',
            'password.min' => 'Data Password Minimal 8 Karakter', */
            'role.required' => 'Data Role Harus Di Isi',
            'role.in' => 'Data Role Harus Admin atau Kasir'
        ];
    }
}

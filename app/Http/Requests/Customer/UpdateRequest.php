<?php

namespace App\Http\Requests\Customer;

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
        $custommerExist = $this->customer ? $this->customer->id : '';

        return [
            'customer_name' => 'required|string',
            'email' => 'required|email|unique:customer,email,' . $custommerExist . ',id',
            'no_hp' => 'required|string|unique:customer,no_hp,' . $custommerExist . ',id',
            'alamat' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'customer_name.required' => 'Data Nama Harus Diisi',
            'customer_name.string' => 'Data Nama Harus Berupa String',
            'email.required' => 'Data Email Harus Di Isi',
            'email.email' => 'Data Email Harus Berupa Email',
            'email.unique' => 'Data Email Sudah Ada',
            'no_hp.required' => 'Data No HP Harus Di Isi',
            'no_hp.string' => 'Data No HP Harus Berupa String',
            'no_hp.unique' => 'Data No HP Sudah Ada',
            'alamat.required' => 'Data Alamat Harus Di Isi',
            'alamat.string' => 'Data Alamat Harus Berupa String',
        ];
    }
}

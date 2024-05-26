<?php

namespace App\Http\Requests\Merk;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'merk_name' => 'required|string|unique:merk,merk_name',
        ];
    }

    public function messages()
    {
        return [
            'merk_name.required' => 'Merk harus diisi!',
            'merk_name.string' => 'Merk harus berupa string!',
            'merk_name.unique' => 'Merk sudah ada!',
        ];
    }
}

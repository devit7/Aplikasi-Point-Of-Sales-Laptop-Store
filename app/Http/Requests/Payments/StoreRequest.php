<?php

namespace App\Http\Requests\Payments;

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
            'payment_name' => 'required|string|unique:payments,payment_name',
        ];
    }

    public function messages()
    {
        return [
            'payment_name.required' => 'Data Payment Name Harus Diisi',
            'payment_name.string' => 'Data Payment Name Harus Berupa String',
            'payment_name.unique' => 'Data Payment Name Sudah Ada',
        ];
    }
}

<?php

namespace App\Http\Requests\Merk;

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
        $merkExist = $this->merk ? $this->merk->id : '';

        return [
            'merk_name' => 'required|string|unique:merk,merk_name,' . $merkExist . ',id',
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

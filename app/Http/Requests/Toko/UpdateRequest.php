<?php

namespace App\Http\Requests\Toko;

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
        $tokoExist = $this->toko ? $this->toko->id : '';

        return [
            'nama_toko' => 'string|required|unique:toko,nama_toko,' . $tokoExist . ',id',
            'logo_toko' => 'nullable|max:10048',
            'alamat' => 'string|required',
            'no_hp' => 'numeric|required|digits:12|unsigned|unique:toko,no_hp,' . $tokoExist . ',id',
        ];

    }

    public function messages()
    {
        return [
            'nama_toko.required' => 'Data Nama Toko harus diisi',
            'nama_toko.string' => 'Data Nama Toko harus berupa string',
            'nama_toko.unique' => 'Data Nama Toko sudah ada',
            'logo_toko.max' => 'Data Logo Toko maksimal 10 MB',
            'alamat.required' => 'Data Alamat harus diisi',
            'alamat.string' => 'Data Alamat harus berupa string',
            'no_hp.required' => 'Data No. HP harus diisi',
            'no_hp.numeric' => 'Data No. HP harus berupa angka',
            'no_hp.digits' => 'Data No. HP harus 12 digit',
            'no_hp.unique' => 'Data No. HP sudah ada',
            'no_hp.unsigned' => 'Data No. HP harus berupa angka positif',
        ];
    }
}

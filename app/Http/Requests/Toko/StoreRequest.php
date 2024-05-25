<?php

namespace App\Http\Requests\Toko;

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
            'nama_toko' => 'required|string|unique:toko,nama_toko',
            'logo_toko' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
            'alamat' => 'required|string',
            'no_hp' => 'required|numeric|unsigned|digits:12|unique:toko,no_hp',
        ];
    }

    public function messages()
    {
        return [
            'nama_toko.required' => 'Data Nama Toko harus diisi',
            'nama_toko.string' => 'Data Nama Toko harus berupa string',
            'nama_toko.unique' => 'Data Nama Toko sudah ada',
            'logo_toko.image' => 'Data Logo Toko harus berupa file gambar',
            'logo_toko.mimes' => 'Data Logo Toko harus berupa file gambar',
            'logo_toko.max' => 'Data Logo Toko maksimal 10 MB',
            'alamat.required' => 'Data Alamat harus diisi',
            'alamat.string' => 'Data Alamat harus berupa string',
            'no_hp.required' => 'Data No. HP harus diisi',
            'no_hp.numeric' => 'Data No. HP harus berupa angka',
            'no_hp.digits' => 'Data No. HP harus 12 digit',
            'no_hp.unsigned' => 'Data No. HP harus berupa angka positif',
        ];
    }
}

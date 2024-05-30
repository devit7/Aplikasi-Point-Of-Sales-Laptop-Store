<?php

namespace App\Http\Requests\Supplier;

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
            'supplier_name' => 'required|string',
            'no_hp' => 'required|numeric|digits_between:10,13|unsigned|unique:supplier,no_hp',
            'nama_perusahaan' => 'required|string',
            'alamat' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'supplier_name.required' => 'Data Nama Supplier harus diisi',
            'supplier_name.string' => 'Data Nama Supplier harus berupa string',
            'no_hp.required' => 'Data Nomor HP harus diisi',
            'no_hp.numeric' => 'Data Nomor HP harus berupa angka',
            'no_hp.digits_between' => 'Data Nomor HP harus diantara 10 sampai 13 digit',
            'no_hp.unique' => 'Data Nomor HP sudah ada',
            'no_hp.unsigned' => 'Data Nomor HP harus berupa angka positif',
            'nama_perusahaan.required' => 'Data Nama Perusahaan harus diisi',
            'nama_perusahaan.string' => 'Data Nama Perusahaan harus berupa string',
            'alamat.required' => 'Data Alamat harus diisi',
            'alamat.string' => 'Data Alamat harus berupa string',
        ];
    }
}

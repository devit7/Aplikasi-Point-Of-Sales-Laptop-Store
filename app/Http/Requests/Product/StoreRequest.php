<?php

namespace App\Http\Requests\Product;

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
            'product_name' => 'required|string|unique:product,product_name',
            'stock' => 'required|numeric|unsigned|min:1',
            'harga_jual' => 'required|numeric|unsigned|not_in:0',
            'harga_asli' => 'required|numeric|unsigned|not_in:0',
            'img' => 'image|max:10048',
            'supplier_id' => 'required',
            'merk_id' => 'required',
            // 'status' => 'required|in:aktif,tidak aktif',
        ];
    }

    public function messages()
    {
        return [
            'product_name.required' => 'Data Nama produk harus diisi',
            'product_name.string' => 'Data Nama produk harus berupa string',
            'product_name.unique' => 'Data Nama produk sudah ada',
            'stock.required' => 'Data Stock harus diisi',
            'stock.numeric' => 'Data Stock harus berupa angka',
            'stock.unsigned' => 'Data Stock tidak boleh negatif',
            'stock.min' => 'Data Stock minimal 1',
            'harga_jual.required' => 'Data Harga jual harus diisi',
            'harga_jual.numeric' => 'Data Harga jual harus berupa angka',
            'harga_jual.unsigned' => 'Data Harga jual tidak boleh negatif',
            'harga_jual.not_in' => 'Data Harga jual Tidak Boleh 0',
            'harga_asli.required' => 'Data Harga asli harus diisi',
            'harga_asli.numeric' => 'Data Harga asli harus berupa angka',
            'harga_asli.unsigned' => 'Data Harga asli tidak boleh negatif',
            'harga_asli.not_in' => 'Data Harga asli Tidak Boleh 0',
            'img.image' => 'Data Gambar harus berupa gambar',
            'img.mimes' => 'Data Gambar harus berupa jpeg,png,jpg,gif,svg',
            'img.max' => 'Data Gambar maksimal 10 MB',
            'supplier_id.required' => 'Data Supplier harus diisi',
            'supplier_id.exists' => 'Data Supplier tidak ada',
            'merk_id.required' => 'Data Merk harus diisi',
            'merk_id.exists' => 'Data Merk tidak ada',
            'status.required' => 'Data Status harus diisi',
            'status.in' => 'Data Status harus aktif/tidak aktif',
        ];
    }
}

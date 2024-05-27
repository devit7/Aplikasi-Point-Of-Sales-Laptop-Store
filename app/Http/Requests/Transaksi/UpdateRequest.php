<?php

namespace App\Http\Requests\Transaksi;

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
        return [
            'user_id' => 'required|exists:users,id',
            'customer_id' => 'required|exists:customer,id',
            'toko_id' => 'required|exists:toko,id',
            'payment_id' => 'required|exists:payments,id',
            'product_id' => 'required|array',
            'product_id.*' => 'required|exists:product,id', // data dalam arraynya
            'quantity' => 'required|array',
            'quantity.*' => 'required|numeric|unsigned',
            'harga_jual' => 'required|array',
            'harga_jual.*' => 'required|numeric|unsigned',
            'harga_asli' => 'required|array',
            'harga_asli.*' => 'required|numeric|unsigned',
            'total_tiap_produk' => 'required|array',
            'total_tiap_produk.*' => 'required|numeric|unsigned',
            'total_semua' => 'required|numeric|unsigned',
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'Data User Harus Diisi',
            'user_id.exists' => 'Data User Tidak Ditemukan',
            'customer_id.required' => 'Data Customer Harus Diisi',
            'customer_id.exists' => 'Data Customer Tidak Ditemukan',
            'toko_id.required' => 'Data Toko Harus Diisi',
            'toko_id.exists' => 'Data Toko Tidak Ditemukan',
            'payment_id.required' => 'Data Payment Harus Diisi',
            'payment_id.exists' => 'Data Payment Tidak Ditemukan',
            'product_id.required' => 'Data Product Harus Diisi',
            'product_id.array' => 'Data Product Harus Berupa Array',
            'product_id.*.required' => 'Data Product Harus Diisi',
            'product_id.*.exists' => 'Data Product Tidak Ditemukan',
            'quantity.required' => 'Data Quantity Harus Diisi',
            'quantity.array' => 'Data Quantity Harus Berupa Array',
            'quantity.*.required' => 'Data Quantity Harus Diisi',
            'quantity.*.numeric' => 'Data Quantity Harus Berupa Angka',
            'quantity.*.unsigned' => 'Data Quantity Tidak Boleh Negatif',
            'harga_jual.required' => 'Data Harga Jual Harus Diisi',
            'harga_jual.array' => 'Data Harga Jual Harus Berupa Array',
            'harga_jual.*.required' => 'Data Harga Jual Harus Diisi',
            'harga_jual.*.numeric' => 'Data Harga Jual Harus Berupa Angka',
            'harga_jual.*.unsigned' => 'Data Harga Jual Tidak Boleh Negatif',
            'harga_asli.required' => 'Data Harga Asli Harus Diisi',
            'harga_asli.array' => 'Data Harga Asli Harus Berupa Array',
            'harga_asli.*.required' => 'Data Harga Asli Harus Diisi',
            'harga_asli.*.numeric' => 'Data Harga Asli Harus Berupa Angka',
            'harga_asli.*.unsigned' => 'Data Harga Asli Tidak Boleh Negatif',
            'total_tiap_produk.required' => 'Data Total Tiap Produk Harus Diisi',
            'total_tiap_produk.array' => 'Data Total Tiap Produk Harus Berupa Array',
            'total_tiap_produk.*.required' => 'Data Total Tiap Produk Harus Diisi',
            'total_tiap_produk.*.numeric' => 'Data Total Tiap Produk Harus Berupa Angka',
            'total_tiap_produk.*.unsigned' => 'Data Total Tiap Produk Tidak Boleh Negatif',
            'total_semua.required' => 'Data Total Harus Diisi',
            'total_semua.numeric' => 'Data Total Harus Berupa Angka',
            'total_semua.unsigned' => 'Data Total Tidak Boleh Negatif',
        ];
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'transaksi';

    protected $guarded = [
        'id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function customer()
    {
        return $this->belongsTo(Customers::class, 'customer_id', 'id');
    }

    public function toko()
    {
        return $this->belongsTo(Toko::class, 'toko_id', 'id');
    }

    public function payment()
    {
        return $this->belongsTo(Payments::class, 'payment_id', 'id');
    }

    public function product()
    {
        return $this->belongsToMany(Product::class, 'detail_transaksi', 'transaksi_id')->withPivot('id','quantity','harga_jual','harga_asli','total')->withTimestamps();
    }

}

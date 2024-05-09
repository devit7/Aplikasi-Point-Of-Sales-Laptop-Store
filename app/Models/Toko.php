<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'toko';

    protected $guarded = [
        'id'
    ];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'toko_id', 'id');
    }

}

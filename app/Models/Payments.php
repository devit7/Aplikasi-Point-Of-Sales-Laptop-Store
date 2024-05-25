<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'payments';

    protected $guarded = [
        'id'
    ];
    protected $fillable = [
        'payment_name'
    ];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'payment_id', 'id');
    }

}

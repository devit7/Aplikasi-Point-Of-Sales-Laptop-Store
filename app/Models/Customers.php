<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'customer';

    protected $guarded = [
        'id'
    ];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'customer_id', 'id');
    }
    
}

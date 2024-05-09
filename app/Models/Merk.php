<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'merk';

    protected $guarded = [
        'id'
    ];

    public function product()
    {
        return $this->hasMany(Product::class, 'merk_id', 'id');
    }
}

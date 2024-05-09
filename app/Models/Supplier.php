<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'supplier';

    protected $guarded = [
        'id'
    ];

    public function product()
    {
        return $this->hasMany(Product::class, 'supplier_id', 'id');
    }

}

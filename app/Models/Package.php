<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'height',
        'width',
        'length',
        'weight',
        'depot_id',
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_package', 'package_id', 'order_id');
    }
}

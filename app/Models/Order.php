<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'state',
        'client_id',
        'depot_id',
        'truck_id',
        'deliveryman_id',
    ];

    public function client()
    {
        return $this->belongsTo(User::class);
    }

    public function depot()
    {
        return $this->belongsTo(Depot::class);
    }

    public function truck()
    {
        return $this->belongsTo(Truck::class);
    }

    public function deliveryman()
    {
        return $this->belongsTo(User::class);
    }

    public function packages()
    {
        return $this->belongsToMany(Package::class, 'order_package', 'order_id', 'package_id');
    }
}

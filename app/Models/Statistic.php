<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function product() {
        return $this->hasMany(Product::class, 'id', 'product_id');
    }


    public function shop()
    {
        return $this->hasMany(PointOfSale::class, 'id', 'point_of_sale_id');
    }
}

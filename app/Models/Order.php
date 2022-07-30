<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function ProductOrders(){
        return $this->hasMany(ProductOrder::class,'order_id','id');
    }
}

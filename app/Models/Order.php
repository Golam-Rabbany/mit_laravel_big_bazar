<?php

namespace App\Models;

use App\Models\ProductOrder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    public function ProductOrders(){ 
        return $this->hasMany(ProductOrder::class,'order_id','id');
    }
    
}

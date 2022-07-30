<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\ProductOrder;
use Illuminate\Http\Request;

class ProductOrderController extends Controller
{
    public function index($id){
      $data=Order::with('ProductOrders')->where('id',$id)->first();

        return view('backend.product_order.index',compact('data'));
        
    }
}

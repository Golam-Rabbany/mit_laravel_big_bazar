<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
  
    public function index()
    {
        echo Session::all();
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
      
        if ($request->session()->has('cart')) {
            foreach (Session::get('cart') as $cart_row) {
                if ($cart_row['product_id'] == $request->product_id) {
                    return redirect()->back()->with(['cardError' => 'The Product Already In Cart']);
                }
            }
            Session::push('cart', [
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'product_title' => $request->product_title,
            ]);
            return redirect()->back()->with(['success' => 'The Product Add To Cart']);
        } else {
            Session::push('cart', [
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'product_title' => $request->product_title,
            ]);
            return redirect()->back()->with(['success' => 'The Product Add To Cart']);
        }
    }


    public function show($id)
    {
         
        $cart = Session::get('cart', []);

        $products = Product::select(['id','product_title','sale_price','product_photo'])
            ->whereIn('id', array_column($cart, 'product_id'))->get()->keyBy('id');

        $carts= collect($cart)->map(function ($data) use ($products) {
            $data['product'] = $products[$data['product_id']];
            return $data;
        }); 


        return view('frontend.cart.cart',compact('carts'));
    }

  
    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

 
    public function destroy($id)
    {
        //
    }
}

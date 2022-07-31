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
        return Session::get('cart');
    }


    public function create()
    {

    }

    public function store(Request $request)
    {

        $alreadyOnCart = false;
        
        if ($request->session()->has('cart')) {
            $cartData = [];
            foreach (Session::get('cart') as $cart_row) {
                if ($cart_row['product_id'] == $request->product_id) {
                    $cart_row['quantity'] = $cart_row['quantity'] + $request->quantity;
                    $alreadyOnCart = true;
                }
                $cartData[] = $cart_row;
            }
            if ($alreadyOnCart) {
                Session::put('cart', $cartData);
            }
        }

        if (!$alreadyOnCart) {
            Session::push('cart', [
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'product_title' => $request->product_title,
            ]);
        }

        return redirect()->back()->with(['success' => 'The Product Add To Cart']);
    }


    public function show($id)
    {
        
        $cart = Session::get('cart', []);
        $products = Product::select(['id', 'product_title', 'sale_price', 'product_photo'])
            ->whereIn('id', array_column($cart, 'product_id'))->get()->keyBy('id');

        $carts = collect($cart)->map(function ($data) use ($products) {
            $data['product'] = $products[$data['product_id']];
            return $data;
        });


        return view('frontend.cart.cart', compact('carts'));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $item = Session::get('cart', []);
        foreach ($item as $key => $cart) {
            if ($cart['product_id'] == $id) {
                $item[$key]['quantity'] = $request->quantity;
            }
        }
        Session::put('cart', $item);
        return redirect()->back();
    }


    public function destroy($id)
    {
        Session::put('cart', array_filter(Session::get('cart', []), function ($item) use ($id) {
            return $item['product_id'] != $id;
        }));

        return redirect()->back()->with('delete');
    }

}

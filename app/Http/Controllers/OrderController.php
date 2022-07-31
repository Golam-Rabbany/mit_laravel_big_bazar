<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\ProductOrder;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $cart = Session::get('cart', []);

        $products = Product::select(['id','product_title','sale_price','product_photo'])
            ->whereIn('id', array_column($cart, 'product_id'))->get()->keyBy('id');

        $carts= collect($cart)->map(function ($data) use ($products) {
            $data['product'] = $products[$data['product_id']];
            return $data;
        });

        $order = Order::all();
        return view('frontend.order.index',compact('carts','order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Order::with('ProductOrders')->where('id',$id)->first();

        return view('backend.product_order.index',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }


    public function checkout(){
        $cart = Session::get('cart', []);

        $products = Product::select(['id','product_title','sale_price','product_photo'])
            ->whereIn('id', array_column($cart, 'product_id'))->get()->keyBy('id');

        $carts= collect($cart)->map(function ($data) use ($products) {
            $data['product'] = $products[$data['product_id']];
            return $data;
        });

        return view('frontend.checkout.index',compact('carts'));
    }


    //checkout option
    public function orderdetails(Request $request){
        
        $this->validate($request, [
            'address'=>'required',
            'phone'=>'required',
        ]);
       
       if(Auth::user()){
        $orders = new Order();
        $orders->address = $request->address;
        $orders->name = Auth::user()->name;
        $orders->email = Auth::user()->email;
        $orders->phone = $request->phone;
        $orders->total_cost = $request->total_cost;
        $orders->payment_method = $request->payment;
        $orders->delivary_method = $request->delivary;
        $orders->save();

        foreach(Session::get('cart') as $item){
              $product=new ProductOrder;
              $product->order_id=$orders->id;
              $product->product_id=$item['product_id'];
              $product->quantity=$item['quantity'];
              $product->save();
        }
        Session::forget('cart');
        
        return back()->with('order_complete', 'Product Order Successfully Done!!');

       }else{
        return redirect()->route('login');
       }

       
    }


    public function delete($id){
        $del = Order::find($id);
        $del->delete();
        return back();
    }

}

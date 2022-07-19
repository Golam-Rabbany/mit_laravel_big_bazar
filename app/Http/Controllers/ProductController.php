<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    // public function productDetails($id){
    //     $products=Product::where('id',$id)->first();
    //     return view('productPage',compact('products'));
    // }


    public function index()
    {
        $products = Product::all();
        return view('backend.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.product.create');
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
        $products = new Product();
        $products->category_id = $request->category_id;
        $products->product_title = $request->product_title;
        $products->sale_price = $request->sale_price;
        $products->main_price = $request->main_price;
        $products->short_desc = $request->short_desc;
        $products->long_desc = $request->long_desc;
        $products->information = $request->information;
        $products->quantity = $request->quantity;
        $products->sku =Str::slug($request->product_title)."-".Str::random(5);

        if($request->hasFile('product_photo')){
            $upload = $request->file('product_photo');
            $photo_name = time().".".$upload->getClientOriginalExtension();
            Image::make($upload)->save(public_path('uploads/product/'.$photo_name));
            $products->product_photo = $photo_name;
        }
        $products->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('backend.product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->product_title = $request->product_title;
        $product->sale_price = $request->sale_price;
        $product->main_price = $request->main_price;
        $product->quantity = $request->quantity;

        if($request->hasFile('product_photo')){
            $delete_photo = public_path('uploads/product/'.$product->product_photo);
            if(File::exists($delete_photo)){
                File::delete($delete_photo);
            }
            $upload = $request->file('product_photo');
            $photo_name = time().".".$upload->getClientOriginalExtension();
            Image::make($upload)->save(public_path('uploads/product/'.$photo_name));
            $product->product_photo = $photo_name;
        }
        $product->update();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return back();
    }

}

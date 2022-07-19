<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Demo;
use App\Models\Demoproduct;
use App\Models\Frontend;
use App\Models\Grocery;
use Illuminate\Http\Request;
use App\Models\Logo;
use App\Models\Product;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logo = Logo::all();
          $alldata=Category::with('product')->get();
          $grocery=Category::with('grocery')->get();
        return view('layouts.frontend_main',compact('alldata','grocery','logo'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function show(Frontend $frontend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function edit(Frontend $frontend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Frontend $frontend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function destroy(Frontend $frontend)
    {
        //
    }

    public function frontendproduct(){
        return view('frontpage.frontend.frontend_product');
    }

    public function productDetails($sku){
        $products = Product::where('sku', $sku)->firstOrFail();
        $related_products = Product::where('category_id', $products->category_id)->where('id', '!=', $products->id)->get();
        return view('backend.product.singleproduct',compact('products','related_products'));
    }

    public function groceryProduct($slug){
        $grocerys = Grocery::where('slug', $slug)->firstOrFail();
        $related_grocerys = Grocery::where('category_id', $grocerys->category_id)->where('id', '!=', $grocerys->id)->get();
        return view('backend.grocery.singleGrocery',compact('grocerys','related_grocerys'));

    }



    public function allproduct($id){
        $alldata = Category::where('id',$id)->with('product')->first();
     
        return view('backend.product.allproduct',compact('alldata'));
    }

    public function catProduct($id){
        $data = Demo::where('id',$id)->with('demoproduct')->first();
        return view('backend.demo.singledemoproduct',compact('data'));
    }


}

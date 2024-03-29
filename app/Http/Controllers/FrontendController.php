<?php

namespace App\Http\Controllers;


use App\Models\Demo;
use App\Models\Logo;
use App\Models\Grocery;
use App\Models\Product;
use App\Models\Category;
use App\Models\Frontend;
use App\Models\Demoproduct;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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

 


    //single product
    public function productDetails($sku){

        $products = Product::where('sku', $sku)->firstOrFail();
        $related_products = Product::where('category_id', $products->category_id)->where('id', '!=', $products->id)->get();
        return view('frontend.product.single_product',compact('products','related_products'));
    }

    //single product details view
    public function productDetailsView($id){
        $products = Product::where('id', $id)->firstOrFail();
        $related_products = Product::where('category_id', $products->category_id)->where('id', '!=', $products->id)->get();
        return view('frontend.product.single_product',compact('products','related_products'));
    }

    //single grocery
    public function groceryProduct($slug){
        $grocerys = Grocery::where('slug', $slug)->firstOrFail();
        $related_grocerys = Grocery::where('category_id', $grocerys->category_id)->where('id', '!=', $grocerys->id)->get();
        return view('backend.grocery.singleGrocery',compact('grocerys','related_grocerys'));

    }


    //category_product
    public function allproduct($id){
        $alldata = Category::where('id',$id)->with('product')->first();
     
        return view('frontend.product.category_product',compact('alldata'));
    }

    public function catProduct($id){
        $data = Demo::where('id',$id)->with('demoproduct')->first();
        return view('backend.demo.singledemoproduct',compact('data'));
    }

    // public function productshow(){
    //     return view('frontend.product.single_product');
    // }

    public function testroute(){
        // Role::create(['name' => 'User']);
        // Permission::create(['name' => 'index']);
        // $permission = Permission::find('3');
        $role = Role::find('1');
        $user = User::find('1');
        $user->assignRole($role);
    }



}

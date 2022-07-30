<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $my_store = Store::all();
        return view('backend.store.index',compact('my_store'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.store.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = new Store();
        $store->store_name = $request->store_name;
        $store->offer = $request->offer;
        $store->quantity_way = $request->quantity_way;
        
        if($request->hasFile('store_main_photo')){
            $uploaded = $request->file('store_main_photo');
            $extention=$uploaded->getClientOriginalName();
            $filename=time().rand(0,9999).'.'.$extention;
            $uploaded->move('uploads/store/',$filename);
            $store->store_main_photo=$filename;
        }

        if($request->hasFile('store_photo')){
            $upload = $request->file('store_photo');
            $photo_name = time().".".$upload->getClientOriginalExtension();
            Image::make($upload)->save(public_path('uploads/store/'.$photo_name));
            $store->store_photo = $photo_name;
        }
        $store->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        return view('backend.store.edit',compact('store'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
        $store->store_name = $request->store_name;
        $store->offer = $request->offer;
        $store->quantity_way = $request->quantity_way;
        
        if($request->hasFile('store_main_photo')){
            $delete_photo = public_path('uploads/store/'.$store->store_main_photo);
            if(File::exists($delete_photo)){
                File::delete($delete_photo);
            }
            $uploaded = $request->file('store_main_photo');
            $extention=$uploaded->getClientOriginalName();
            $filename=time().rand(0,9999).'.'.$extention;
            $uploaded->move('uploads/store/',$filename);
            $store->store_main_photo=$filename;
        }

        if($request->hasFile('store_photo')){
            $delete_photo = public_path('uploads/store/'.$store->store_photo);
            if(File::exists($delete_photo)){
                File::delete($delete_photo);
            }
            $upload = $request->file('store_photo');
            $photo_name = time().".".$upload->getClientOriginalExtension();
            Image::make($upload)->save(public_path('uploads/store/'.$photo_name));
            $store->store_photo = $photo_name;
        }
        $store->update();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        $store->delete();
        return back();
    }

    public function singlestore($id){
        $stores = Store::where('id', $id)->firstOrFail();
        return view('backend.store.singlestore',compact('stores'));
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Grocery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class GroceryController extends Controller
{
   

    public function index()
    {
        $my_grocery = Grocery::all();
        return view('backend.grocery.index',compact('my_grocery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.grocery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $grocery = new Grocery();
        $grocery->category_id = $request->category_id;
        $grocery->grocery_name = $request->grocery_name;
        $grocery->slug = Str::slug($request->grocery_name."-".Str::random(4));
        if($request->hasFile('grocery_main_photo')){
            $uploaded = $request->file('grocery_main_photo');
            $extention=$uploaded->getClientOriginalName();
            $filename=time().rand(0,9999).'.'.$extention;
            $uploaded->move('uploads/grocery/',$filename);
            $grocery->grocery_main_photo=$filename;
        }

        if($request->hasFile('grocery_photo')){
            $upload = $request->file('grocery_photo');
            $photo_name = time().".".$upload->getClientOriginalExtension();
            Image::make($upload)->save(public_path('uploads/grocery/'.$photo_name));
            $grocery->grocery_photo = $photo_name;
        }
        $grocery->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grocery  $grocery
     * @return \Illuminate\Http\Response
     */
    public function show(Grocery $grocery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grocery  $grocery
     * @return \Illuminate\Http\Response
     */
    public function edit(Grocery $grocery)
    {
        return view('backend.grocery.edit',compact('grocery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Grocery  $grocery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grocery $grocery)
    {
        $grocery->grocery_name = $request->grocery_name;
        if($request->hasFile('grocery_main_photo')){
            $delete_photo = public_path('uploads/grocery/'.$grocery->grocery_main_photo);
            if(File::exists($delete_photo)){
                File::delete($delete_photo);
            }
            $uploaded = $request->file('grocery_main_photo');
            $extention=$uploaded->getClientOriginalName();
            $filename=time().rand(0,9999).'.'.$extention;
            $uploaded->move('uploads/grocery/',$filename);
            $grocery->grocery_main_photo=$filename;
        }

        if($request->hasFile('grocery_photo')){
            $delete_photo = public_path('uploads/grocery/'.$grocery->grocery_photo);
            if(File::exists($delete_photo)){
                File::delete($delete_photo);
            }
            $upload = $request->file('grocery_photo');
            $photo_name = time().".".$upload->getClientOriginalExtension();
            Image::make($upload)->save(public_path('uploads/grocery/'.$photo_name));
            $grocery->grocery_photo = $photo_name;
        }
        $grocery->update();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grocery  $grocery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grocery $grocery)
    {
        $grocery->delete();
        return back();
    }
}

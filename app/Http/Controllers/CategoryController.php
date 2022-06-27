<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys = Category::all();
        return view('backend.category.index',compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_name'=>'required',
            'category_photo'=>'required|image|mimes:png,jpg',

        ]);

        $categorys = new Category();
        $categorys->category_name = $request->category_name;

        if($request->hasFile('category_photo')){
            $upload = $request->file('category_photo');
            $photo_name = time().".".$upload->getClientOriginalExtension();
            Image::make($upload)->save(public_path('uploads/category/'.$photo_name));
            $categorys->category_photo = $photo_name;
        }
        $categorys->save();
        return back()->with('message', 'Category added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('backend.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->category_name = $request->category_name;

        if($request->hasFile('category_photo')){
            $delete_photo = public_path('uploads/category/'.$category->category_photo);
            if(File::exists($delete_photo)){
                File::delete($delete_photo);
            }
            $uploaded = $request->file('category_photo');
            $extention=$uploaded->getClientOriginalName();
            $filename=time().rand(0,9999).'.'.$extention;
            $uploaded->move('uploads/category/',$filename);
            $category->category_photo=$filename;
    }
    $category->update();
    return back();
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $delete_photo = public_path('uploads/category.'.$category->category_photo);
        if(File::exists($delete_photo)){
            File::delete($delete_photo);
        }

        $category->delete();
        return back();
    }
}

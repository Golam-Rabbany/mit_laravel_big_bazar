<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;



class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner_datas = Banner::all();
        return view('backend.banner.index',compact('banner_datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.banner.create');
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
            'banner_photo'=>'image|mimes:png,jpg,webp,jpeg',
            'sub_banner'=>'image|mimes:png,jpg,webp,jpeg',
        ]);
        $added =new  Banner;

          if($request->hasFile('banner_photo')){
            $upload = $request->file('banner_photo');
            $photo_name = time().".".$upload->getClientOriginalExtension();
            Image::make($upload)->save(public_path('uploads/banner/'.$photo_name));
            $added->banner_photo = $photo_name;
        }

        if($request->hasFile('sub_banner')){
            $upload = $request->file('sub_banner');
            $photo_name = time().".".$upload->getClientOriginalExtension();
            Image::make($upload)->save(public_path('uploads/banner/'.$photo_name));
            $added->sub_banner = $photo_name;
        }


        $added->save();
        return redirect()->back()->with('message', 'Banner added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('backend.banner.edit',compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        $this->validate($request, [
            'banner_photo'=>'image|mimes:png,jpg,webp,jpeg',
            'sub_banner'=>'image|mimes:png,jpg,webp,jpeg',
        ]);
        
        if($request->hasFile('banner_photo')){
            $delete_photo = public_path('uploads/banner/'.$banner->banner_photo);
            if(File::exists($delete_photo)){
                File::delete($delete_photo);
            }
            $uploaded = $request->file('banner_photo');
            $extention=$uploaded->getClientOriginalName();
            $filename=time().rand(0,9999).'.'.$extention;
            $uploaded->move('uploads/banner/',$filename);
            $banner->banner_photo=$filename;
        }

        if($request->hasFile('sub_banner')){
            $delete_photo = public_path('uploads/banner/'.$banner->sub_banner);
            if(File::exists($delete_photo)){
                File::delete($delete_photo);
            }
            $uploaded = $request->file('sub_banner');
            $extention=$uploaded->getClientOriginalName();
            $filename=time().rand(0,9999).'.'.$extention;
            $uploaded->move('uploads/banner/',$filename);
            $banner->sub_banner=$filename;
        }
        $banner->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        return back();
    }
}

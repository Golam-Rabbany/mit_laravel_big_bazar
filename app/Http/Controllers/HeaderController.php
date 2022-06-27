<?php

namespace App\Http\Controllers;

use App\Models\Header;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $headers = Header::all();
        return view('backend.header.index',compact('headers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.header.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $header = new Header();
        $header->number = $request->number;
        $header->social = $request->social;
        if($request->hasFile('logo')){
            $uploaded = $request->file('logo');
            $extention=$uploaded->getClientOriginalName();
            $filename=time().rand(0,9999).'.'.$extention;
            $uploaded->move('uploads/header/',$filename);
            $header->logo=$filename;
        }
        $header->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Header  $header
     * @return \Illuminate\Http\Response
     */
    public function show(Header $header)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Header  $header
     * @return \Illuminate\Http\Response
     */
    public function edit(Header $header)
    {
        return view('backend.header.edit',compact('header'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Header  $header
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Header $header)
    {
        if($request->hasFile('logo')){
            $delete_photo = public_path('uploads/header/'.$header->logo);
            if(File::exists($delete_photo)){
                File::delete($delete_photo);
            }
            $uploaded = $request->file('logo');
            $extention=$uploaded->getClientOriginalName();
            $filename=time().rand(0,9999).'.'.$extention;
            $uploaded->move('uploads/header/',$filename);
            $header->logo=$filename;
        }
        $header->update();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Header  $header
     * @return \Illuminate\Http\Response
     */
    public function destroy(Header $header)
    {
        $header->delete();
        return back();
    }
}

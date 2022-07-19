<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.profile.create');
        
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
        User::find(Auth::id())->update([
            'name'=>$request->name,
        ]);
        return back();

       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    public function profile_photo(Request $request){
        $this->validate($request, [
            'profile_photo' => 'required|image|mimes:png,jpg,webp',
        ]);

        if($request->hasFile('profile_photo')){
            $contact = $request->file('profile_photo')->store('uploads/profile');
            echo $contact;
        
         }
       
            // return back()->with('image_success', 'Profile Photo changes successfully');

        }

        public function chng_password(Request $request){
            $this->validate($request, [
                'password' => 'confirmed|required||min:5',
            ]);
            if(Hash::check($request->old_pass, Auth::user()->password)){
                if($request->old_pass == $request->password){
                    return back()->with('password_error', 'Your old password & new password are same');
                }else{
                    User::find(Auth::id())->update([
                        'password'=>Hash::make($request->password),
                    ]);
                    return back()->with('success', 'Password changes successfully');
                }
            }
            else{
                return back()->with('password_error', "Old password doesn't match");
            }
        }
    
}

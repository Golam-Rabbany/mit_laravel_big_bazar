@extends('layouts.dashboard_main')

@section('content')
<h2 style="color:brown"><span>Create Banner </span>/ <a href="{{route('banner.index')}}"> View Banner</a></h2><br>
<form action="{{route('banner.update',$banner->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mt-3">
        <label for="label-control">Banner Photo</label>
        <input type="file" name="banner_photo"  class="form-control">
        @error('banner_photo')
            <p class="text-danger">{{$message}}</p>
        @enderror
        <img src="{{asset('uploads/banner/'.$banner->banner_photo)}}" class="mt-3" width="200px" alt="">
    </div>
    <div class="mt-3">
        <label for="label-control">Sub Banner Photo</label>
        <input type="file" name="sub_banner"  class="form-control">
        @error('sub_banner')
            <p class="text-danger">{{$message}}</p>
        @enderror
        <img src="{{asset('uploads/banner/'.$banner->sub_banner)}}" class="mt-3" width="200px" alt="">
    </div>
    <button class="btn btn-info mt-3">Submit</button>
</form>
@endsection
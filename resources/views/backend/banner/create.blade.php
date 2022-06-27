@extends('layouts.dashboard_main')

@section('content')
<h2 style="color:brown"><span>Create Banner </span>/ <a href="{{route('banner.index')}}"> View Banner</a></h2><br>

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

<form action="{{route('banner.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mt-3">
        <label for="label-control">Banner Photo</label>
        <input type="file" name="banner_photo"  class="form-control">
        @error('banner_photo')
            <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
    <div class="mt-3">
        <label for="label-control">Sub Banner Photo</label>
        <input type="file" name="sub_banner"  class="form-control">
        @error('sub_banner')
            <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
    <button class="btn btn-info mt-3">Submit</button>
</form>
@endsection
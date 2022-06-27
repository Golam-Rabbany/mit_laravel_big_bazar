@extends('layouts.dashboard_main')

@section('content')
<h2 style="color:brown"><span>Create Header </span>/ <a href="{{route('header.index')}}"> View Header</a></h2><br>
<form action="{{route('header.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mt-3">
        <label for="label-control">Header Number</label>
        <input type="number" name="number" value="{{$header->number}}" class="form-control">
    </div>
    <div class="mt-3">
        <label for="label-control">Header Logo</label>
        <input type="file" name="logo" class="form-control">
        <img src="{{asset('uploads/header/'.$header->logo)}}" alt="">
    </div>
    <div class="mt-3">
        <label for="label-control">Social Logo</label>
        <input type="text" name="social" value="{{$header->social}}" class="form-control">
    </div>
    <button class="btn btn-info mt-3">Submit</button>
</form>
@endsection
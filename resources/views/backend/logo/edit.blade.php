@extends('layouts.dashboard_main')

@section('content')
<h2 style="color:brown"><span>Edit Logo </span>/ <a href="{{route('logo.index')}}">View Logo</a></h2><br>
<form action="{{route('logo.update',$logo->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mt-3">
        <label for="label-control">Logo</label>
        <input type="file" name="logo" class="form-control">
        <img src="{{asset('uploads/logo/'.$logo->logo)}}" alt="">
    </div>
    <button class="btn btn-info mt-3">Submit</button>
</form>
@endsection
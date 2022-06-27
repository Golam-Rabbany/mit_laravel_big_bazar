@extends('layouts.dashboard_main')

@section('content')
<h2 style="color:brown"><span>Create Logo </span>/ <a href="{{route('logo.index')}}">View Logo</a></h2><br>
<form action="{{route('logo.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mt-3">
        <label for="label-control">Logo</label>
        <input type="file" name="logo" class="form-control">
    </div>
    <button class="btn btn-info mt-3">Submit</button>
</form>
@endsection
@extends('layouts.dashboard_main')

@section('content')

@can('all_show')
    

<h2 style="color:brown"><span>Create Category </span>/ <a href="{{route('category.index')}}"> View Category</a></h2><br>
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
<form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mt-3">
        <label for="label-control">Category Name</label>
        <input type="text" name="category_name"  class="form-control">
        @error('category_name')
            <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
    <div class="mt-3">
        <label for="label-control">Category Photo</label>
        <input type="file" name="category_photo"  class="form-control">
        @error('category_photo')
            <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
    <button class="btn btn-info mt-3">Submit</button>
</form>

@endcan

@endsection
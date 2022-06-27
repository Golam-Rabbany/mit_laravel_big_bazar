@extends('layouts.dashboard_main')

@section('content')
<h2 style="color:brown"><span>Edit Grocery </span>/ <a href="{{route('grocery.index')}}"> View Grocery</a></h2><br>
<form action="{{route('grocery.update',$grocery->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mt-3">
        <label for="label-control">Grocery Product Name</label>
        <input type="text" name="grocery_name" value="{{$grocery->grocery_name}}"  class="form-control">
    </div>
    <div class="mt-3">
        <label for="label-control">Grocery Main Photo</label>
        <input type="file" name="grocery_main_photo"  class="form-control">
        <img src="{{asset('uploads/grocery/'.$grocery->grocery_main_photo)}}" width="150px" alt="">
    </div>
    <div class="mt-3">
        <label for="label-control">Store Photo</label>
        <input type="file" name="grocery_photo"  class="form-control">
        <img src="{{asset('uploads/grocery/'.$grocery->grocery_photo)}}" width="150px" alt="">
    </div>

    <button class="btn btn-info mt-3">Submit</button>
</form>
@endsection
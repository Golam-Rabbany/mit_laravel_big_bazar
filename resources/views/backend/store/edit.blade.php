@extends('layouts.dashboard_main')

@section('content')
<h2 style="color:brown"><span>Edit Store </span>/ <a href="{{route('store.index')}}"> View Store</a></h2><br>
<form action="{{route('store.update',$store->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mt-3">
        <label for="label-control">Store Name</label>
        <input type="text" name="store_name" value="{{$store->store_name}}"  class="form-control">
    </div>
    <div class="mt-3">
        <label for="label-control">Store Main Photo</label>
        <input type="file" name="store_main_photo"  class="form-control">
        <img src="{{asset('uploads/store/'.$store->store_main_photo)}}" width="150px" alt="">

    </div>
    <div class="mt-3">
        <label for="label-control">Store Photo</label>
        <input type="file" name="store_photo"  class="form-control">
        <img src="{{asset('uploads/store/'.$store->store_photo)}}" width="150px" alt="">
    </div>
    <div class="mt-3">
        <label for="label-control">Offer Parcentage</label>
        <input type="number" name="offer" value="{{$store->offer}}"  class="form-control">
    </div>
    <div class="mt-3">
        <label for="label-control">Quantity Way</label>
        <input type="text" name="quantity_way" value="{{$store->quantity_way}}"  class="form-control">
    </div>

    <button class="btn btn-info mt-3">Submit</button>
</form>
@endsection
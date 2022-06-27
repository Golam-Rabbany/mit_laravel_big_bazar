@extends('layouts.dashboard_main')

@section('content')
<h2 style="color:brown"><span>Create Store </span>/ <a href="{{route('store.index')}}"> View Store</a></h2><br>
<form action="{{route('store.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mt-3">
        <label for="label-control">Store Name</label>
        <input type="text" name="store_name"  class="form-control">
    </div>
    <div class="mt-3">
        <label for="label-control">Store Main Photo</label>
        <input type="file" name="store_main_photo"  class="form-control">
    </div>
    <div class="mt-3">
        <label for="label-control">Store Photo</label>
        <input type="file" name="store_photo"  class="form-control">
    </div>
    <div class="mt-3">
        <label for="label-control">Offer Parcentage</label>
        <input type="number" name="offer"  class="form-control">
    </div>
    <div class="mt-3">
        <label for="label-control">Quantity Way</label>
        <input type="text" name="quantity_way"  class="form-control">
    </div>

    <button class="btn btn-info mt-3">Submit</button>
</form>
@endsection
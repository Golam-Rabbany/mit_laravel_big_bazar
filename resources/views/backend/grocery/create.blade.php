@extends('layouts.dashboard_main')

@section('content')
<h2 style="color:brown"><span>Create Grocery </span>/ <a href="{{route('grocery.index')}}"> View Grocery</a></h2><br>
<form action="{{route('grocery.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mt-3">
        <label for="label-control">Category Id</label>
        <select name="category_id" class="form-control" id="category_id" >
            <option value="">----select one----</option>
            @foreach (App\Models\Category::all() as $data)
            <option value="{{$data->id}}">{{$data->category_name}}</option>
            @endforeach
        </select>
    </div>
    <div class="mt-3">
        <label for="label-control">Grocery Product Name</label>
        <input type="text" name="grocery_name"  class="form-control">
    </div>
    <div class="mt-3">
        <label for="label-control">Grocery Main Photo</label>
        <input type="file" name="grocery_main_photo"  class="form-control">
    </div>
    <div class="mt-3">
        <label for="label-control">Store Photo</label>
        <input type="file" name="grocery_photo"  class="form-control">
    </div>

    <button class="btn btn-info mt-3">Submit</button>
</form>
@endsection
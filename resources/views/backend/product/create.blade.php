@extends('layouts.dashboard_main')

@section('content')

@can('all_show')

<h2 style="color:brown"><span>Create Product </span>/ <a href="{{route('product.index')}}"> View Product</a></h2><br>
<form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
    @csrf   
    <div class="mt-3">
        <label for="label-control">Category </label>
      <select name="category_id" id="" class="form-control">
        <option value="">-----option-----</option>
        @foreach (App\Models\Category::all() as $data)
        <option value="{{$data->id}}">{{$data->category_name}}</option>
        @endforeach
      </select>
    </div>

    <div class="mt-3">
        <label for="label-control">Product Name</label>
        <input type="text" name="product_title"  class="form-control">
    </div>
    <div class="mt-3">
        <label for="label-control">Product Main Price</label>
        <input type="number" name="main_price"  class="form-control">
    </div>
    <div class="mt-3">
        <label for="label-control">Product Sale price</label>
        <input type="number" name="sale_price"  class="form-control">
    </div>
    <div class="mt-3">
        <label for="label-control">Short Description</label>
        <input type="text" name="short_desc"  class="form-control">
    </div>
    <div class="mt-3">
        <label for="label-control">Long Description</label>
        <input type="text" name="long_desc"  class="form-control">
    </div>
    <div class="mt-3">
        <label for="label-control">Information</label>
        <input type="text" name="information"  class="form-control">
    </div>
    <div class="mt-3">
        <label for="label-control">Product Photo</label>
        <input type="file" name="product_photo"  class="form-control">
    </div>
    <div class="mt-3">
        <label for="label-control">Quantity</label>
        <input type="number" name="quantity"  class="form-control">
    </div>

    <button class="btn btn-info mt-3">Submit</button>
</form>

    
@endcan
@endsection
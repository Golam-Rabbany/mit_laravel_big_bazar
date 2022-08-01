@extends('layouts.dashboard_main')

@section('content')

@can('create')

<h2 style="color:brown"><span>Create Product </span>/ <a href="{{route('product.index')}}"> View Product</a></h2><br>
<form action="{{route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method("PUT")
    <div class="mt-3">
        <label for="label-control">Product Title</label>
        <input type="text" name="product_title" value="{{$product->product_title}}"  class="form-control">
    </div>
    <div class="mt-3">
        <label for="label-control">Product Main Price</label>
        <input type="number" name="main_price"  value="{{$product->main_price}}" class="form-control">
    </div>
    <div class="mt-3">
        <label for="label-control">Product Sale price</label>
        <input type="number" name="sale_price"  value="{{$product->sale_price}}" class="form-control">
    </div>
    <div class="mt-3">
        <label for="label-control">Quantity</label>
        <input type="number" name="quantity" value="{{$product->quantity}}"  class="form-control">
    </div>
    <div class="mt-3">
        <label for="label-control">Product Photo</label>
        <input type="file" name="product_photo"  class="form-control">
        <img src="{{asset('uploads/product/'.$product->product_photo)}}" width="150px" alt="">
    </div>

    <button class="btn btn-info mt-3">Submit</button>
</form>

    
@endcan

@endsection
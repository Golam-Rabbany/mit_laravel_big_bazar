@extends('layouts.dashboard_main')

@section('content')

@can('create')


<h2 style="color:brown"><span>Edit Product </span>/ <a href="{{route('product.create')}}"> Create Product</a></h2><br>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th>Id</th>
            <th>Category Name</th>
            <th>Another Category using HasOne</th>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>Short Description</th>
            <th>Main Price</th>
            <th>Sale Price</th>
            <th>SKU</th>
            <th>Long Description</th>
            <th>Information</th>
            <th>Quantity</th>
            <th>Action</th>
          </tr>
    </thead>
    <tbody>
        @foreach ($products as $my_product)
        <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{App\Models\Category::find($my_product->category_id)->category_name}}</td>
          <td>{{$my_product->onetoonerelationtable->category_name}}</td>
          {{-- <td>{{print_r($my_product->$onetoonerelation)}}</td> --}}
          <td>{{$my_product->product_title}}</td>
          <td>
            <img src="{{asset('uploads/product/'.$my_product->product_photo)}}" style="height: 100px; width:100px" alt="no image found">
          </td>
          <td>{{$my_product->short_desc}}</td>
          <td>{{$my_product->main_price}}</td>
          <td>{{$my_product->sale_price}}</td>
          <td>{{$my_product->sku}}</td>
          <td>{{$my_product->long_desc}}</td>
          <td>{{$my_product->information}}</td>
          <td>{{$my_product->quantity}}</td>
          <td class="">
            <a href="{{route('product.edit',$my_product->id)}}" class="btn btn-primary btn-sm">Edit</a>
            <form action="{{route('product.destroy',$my_product->id)}}" class="d-inline" method="POST">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger btn-sm" type="submit">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      
    </tbody>
  </table>

    
@endcan

@endsection


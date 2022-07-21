@extends('frontend.layouts.master')
<style>
    .cart-delete-btn:hover{
        background-color: green;
    }
</style>
@section('content')
<section class="my-5">
    <div class="container">
        <div class="row">
            <table class="table table-striped">
                <thead class=" bg-success ">
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Product</th>
                    <th scope="col">Image</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                   @if (Session::get('cart'))
                 
                    @foreach($carts as $data)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$data['product']->product_title}}</td>
                    
                    <td>
                        <img src="{{asset('uploads/product/'.$data['product']->product_photo)}}" width="100px" height="100px" alt="">
                    </td>
                    <td>200</td>
                 
                    <td>
                        <input type="number" class="border pl-2" value="{{$data['quantity']}}" style="width: 50px!important">
                    </td>

                    <td class="">
                        <i class="fa-solid fa-trash p-2 fs-3 cart-delete-btn" style="color:rgb(155, 2, 2); cursor: pointer;"></i>
                    </td>
                  </tr>
                  @endforeach
                  @else
                  <h1>Your Cart Is Empty</h1>
                        
                  @endif
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection
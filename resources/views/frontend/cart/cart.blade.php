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
            <table class="table table-hover">
                <thead class=" bg-success ">
                  <tr>
                    <th scope="col">Action</th>
                    <th scope="col">Id</th>
                    <th scope="col">Product</th>
                    <th scope="col">Image</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th>Total Price</th>
                  </tr>
                </thead>
                <tbody class="table-success">
                    @php
                        $subtotal =0;
                    @endphp
                   @if (Session::get('cart'))
                   
                    @foreach($carts as $data)
                  <tr>
                    <td class="d-flex">
                        <form action="{{route('cart.destroy',$data['product_id'])}}" method="post">
                            @csrf 
                            @method('delete')
                            <button type="submit" onclick="return confirm('Do you Want to Delete')"> 
                                <i class="fa-solid fa-trash p-2 fs-3 cart-delete-btn" style="color:rgb(155, 2, 2); cursor: pointer;"></i>
                            </button>
                        </form>
                    
                    </td>
                    <td>{{$loop->iteration}}</td>
                    <td><a href="{{route('product.details',$data['product_id'])}}" target="_blank" style="text-decoration: none">{{$data['product']->product_title}}</a></td>
                
                    <td>
                        <img src="{{asset('uploads/product/'.$data['product']->product_photo)}}" width="100px" height="100px" alt="">
                    </td>                 
                    <td>
                        <form action="{{route('cart.update',$data['product_id'])}}" method="POST" id="form">
                          @csrf()
                          @method('put')
                        <input name="quantity" type="number" onclick="form.submit()" min="1" class="border pl-2" style="height: 70px; width:70px;" value="{{$data['quantity']}}" style="width: 50px!important">
                    </form>
                    </td>
                    <td>{{$data['product']->sale_price}}</td>
                    <th>{{$total_price = $data['product']->sale_price*$data['quantity']}}</th>

                    @php
                        $subtotal = $subtotal + $total_price;
                    @endphp
                    
                  </tr>
                  @endforeach
                  @else
                  <tr>
                    <th colspan="50" class="text-danger text-center">Your cart is Empty</th>
                  </tr>
                  @endif

                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <th class="fs-5">Sub Total : </th>
                    <td></td>
                    <th class="fs-5">{{$subtotal}}</th>
                  </tr>
                  
                </tbody>
            </table>

            @if(Session::get('cart'))
            <div>
                <a href="{{route('checkout')}}" class="btn btn-info" style="float: right">Checkout</a>
            </div>
            @else
            <div>
               <a href=""></a>
            </div>
            @endif

        </div>
    </div>
</section>

@endsection
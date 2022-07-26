@extends('frontend.layouts.master')

@section('content')

<section class="mt-4">

<table class="table table-success table-striped responsive">
    <thead class="table-warning text-info">
        <tr>
          <th scope="col">Product</th>
          <th scope="col">Photo</th>
          <th scope="col">Price</th>
          <th scope="col">Quantity</th>
          <th scope="col">Sub Total</th>
        </tr>
      </thead>
      <tbody>
@php
  $subtotal = 0;
@endphp

    @foreach ($carts as $cart)
        <tr>
          <th scope="row">{{$cart['product_title']}}</th>
          <td>
            <img src="{{asset('uploads/product/'.$cart['product']->product_photo)}}" height="50px" width="50px" alt="">
          </td>
          <td>{{$cart['product']->sale_price}}</td>
          <td>{{$cart['quantity']}}</td>

          <td>&#2547; {{$sub_total = $cart['quantity'] * $cart['product']->sale_price}}</td>
          @php
              $subtotal = $subtotal + $sub_total;
          @endphp
        </tr>
        @endforeach

        <form action="{{route('order.details')}}" method="POST">
          @csrf
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td>Sub Total Cost: </td>
          <td>&#2547; {{$subtotal}}</td>
      </tr>

        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>Delivery Charge : </td>
            <td>&#2547; 60</td>
        </tr>
        
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <th>Total Cost : </th>
          <th>&#2547; {{$totalcost = $subtotal + 60}}</th>
      </tr>
        
      </tbody>
  </table>

</section>


  <section>
    <div class="container">
      
        <div class="row">
          <div class="col-lg-4 p-2 ">
                <div class="card bg-primary " style="padding: 50px 0px; display:flex; justify-contnet:center; align-items:center">
                  <div class=" p-2 text-white" style="">
                      <h2 class="fs-4 mb-2">Payment Method</h2>
                      <p class="py-2"> Select a Payment Method</p>
                      <span>
                          <input type="radio" value="60" name="payment" id="payment-1">
                          <label for="cash ">Cash on Delivary</label>
                      </span><br>
                      <span>
                        <input type="radio" value="online-delivery" name="payment" id="payment-2">
                        <label for="cash ">Online Delivary</label>
                    </span>
                  </div>
                </div>
          </div>
            <div class="col-lg-4 p-2">
                <div class="card bg-primary text-white" style="padding: 50px 0px; display:flex; justify-contnet:center; align-items:center">
                  <div class="d-block  p-2"  style="">
                      <h2 class="fs-4 mb-2">Delivery Method</h2>
                      <p class="py-2">Select a Delivery Method</p>
                      <span>
                          <input type="radio" value="home_delivary"  name="delivary" id="delivary-1">
                          <label for="cash">Home Delivary, Charge: &#2547; 60</label>
                      </span><br>
                      <span>
                        <input type="radio" value="showroom_delivary" name="delivary" id="delivary-2">
                        <label for="cash">Showroom Delivary, Charge: &#2547; 0</label>
                    </span>
                  </div>
                </div>
            </div>

            <div class="col-lg-4 p-2 mt-2  bg-primary">
                <h2 class="text-white fs-4 mt-3 mb-2">Shipping Delivery</h2>
      
                <div class="d-flex">
                  <div class="p-2">
                    <label for="" class="text-warning">Shipping Address</label><br>
                    <input class="mb-3" name="address" style="padding: 4px 5px; background: white" type="text" placeholder="Shipping Address">
                    @error('address')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="p-2">
                    <label for="" class="text-warning">Phone Number</label><br>
                    <input class="mb-3" name="phone" style="padding: 4px 5px; background: white" type="number" placeholder="Phone Number">
                    @error('phone')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                </div>
        </div>

        <input type="hidden" name="total_cost" value="{{$totalcost}}">

        <div class="form-button d-flex justify-content-end p-2">
          <button type="submit" class="btn bg-info text-white text-lg">Confirm Order</button>
      </div>
    </form>
        </div>
    </div>
  </section>
@endsection

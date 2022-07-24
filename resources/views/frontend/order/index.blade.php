@extends('frontend.layouts.master')

@section('content')

<section class="mt-4">
<table class="table table-success table-striped responsive">
    <thead class="table-warning text-info">
        <tr>
          <th scope="col">Product</th>
          <th scope="col">Photo</th>
          <th scope="col">Unit Price</th>
          <th scope="col">Quantity</th>
          <th scope="col">Sub Total</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">Apple</th>
          <td>
            <img src="{{asset('uploads/product/1656573359.jpg')}}" height="50px" width="50px" alt="">
          </td>
          <td>243</td>
          <td>
            <input type="number" value="23">
          </td>
          <td>&#2547;24423</td>
        </tr>


        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>Delivery Charge : </td>
            <td>&#2547;60</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>Total : </td>
            <td>&#2547; 6000</td>
        </tr>
      </tbody>
  </table>
</section>


  <section>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 p-2 ">
                <div class="card bg-primary text-white" style="padding: 50px 0px">
                  <div class="d-block text-align-center p-2" style="text-align: center">
                      <h2 class="fs-4 mb-2">Payment Method</h2>
                      <p>Select a Payment Method</p>
                      <span>
                          <input type="radio" name="cash" id="cash">
                          <label for="cash">Cash on Delivary</label>
                      </span>
                  </div>
                </div>
          </div>
            <div class="col-lg-4 p-2">
                <div class="card bg-primary text-white" style="padding: 50px 0px">
                  <div class="d-block text-align-center p-2" style="text-align: center">
                      <h2 class="fs-4 mb-2">Delivery Method</h2>
                      <p>Select a Delivery Method</p>
                      <span>
                          <input type="radio" name="cash" id="cash">
                          <label for="cash">Home Delivary, Charge: 60$</label>
                      </span>
                  </div>
                </div>
            </div>

            <div class="col-lg-4 p-2 mt-2  bg-primary">
                <h2 class="text-white fs-4 mt-3 mb-2">Shipping Delivery</h2>
                <form action="{{route('order.store')}}" method="POST">
                  @csrf
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
                    {{-- <input class="mb-3" name="name" style="padding: 4px 5px; background: white" type="text" placeholder="Name"> --}}
                    {{-- <input class="mb-3" name="email" style="padding: 4px 5px; background: white" type="email" placeholder="Email"> --}}
                    
                    <div class="form-button col-md-12 text-center">
                        <button type="submit" class="btn bg-info text-white text-lg">Order</button>
                    </div>
                </form>
        </div>

    
        </div>
    </div>
  </section>
@endsection

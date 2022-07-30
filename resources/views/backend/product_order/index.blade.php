@extends('layouts.dashboard_main')

@section('content')

<table class="table">
    <thead class="thead-dark">
        <tr>
            <th>Id</th>
            <th>Product_id</th>
            <th>Order_id</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Action</th>
          </tr>
    </thead>
    <tbody>
      @foreach ($data->ProductOrders as $product)
        <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{$product->product_id}}</td>
          <td>{{$product->order_id}}</td>
          <td>{{$product->quantity}}</td>
        </tr>
      @endforeach
      
    </tbody>
  </table>
    
@endsection
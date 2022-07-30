@extends('layouts.dashboard_main')


@section('content')
    <div class="container">
        <div class="row">
            <table class="table table-hover">
                <thead class=" bg-success ">
                  <tr>
                    <th>Id</th>
                    <th>User Name</th>
                    <th>User Mail</th>
                    <th>User Phone Number</th>
                    <th>User Address</th>
                    <th>Sub Total Price</th>
                    <th>Payment Charge</th>
                    <th>Payment Method</th>
                    <th>Total Price</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach (App\Models\Order::all() as $order)
                    <tr>
                        <td>{{$loop ->iteration}}</td>
                        <td>{{$order->name}}</td>
                        <td>{{$order->email}}</td>
                        <td>{{$order->phone}}</td>
                        <td>{{$order->address}}</td>
                      
                     
                        <td>{{$order->total_cost - 60}}</td>
                        <td>{{$order->delivary_method}}</td>
                        <td>{{$order->payment_method}}</td>
                        <td>{{$order->total_cost}}</td>
                     
                        <td>
                            <a href="{{route('product.order',$order->id)}}"> <i class="fa fa-eye"></i></a>
                        </td>

                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
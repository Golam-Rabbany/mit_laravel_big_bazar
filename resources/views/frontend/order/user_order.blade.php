@extends('layouts.dashboard_main')


@section('content')
<div class="container">
    <div class="row">

        @if(session()->has('order_complete'))
        <div class="alert alert-success">
            {{ session()->get('order_complete') }}
        </div>
    @endif

        <table class="table table-dark" style="margin: 2rem 0">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Order Date</th>
                <th scope="col">Total Amount</th>

            </tr>
            </thead>
            <tbody>
                @php
                    $total = 0;
                @endphp
                @foreach ($user_product as $order_data)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{App\Models\Product::find($order_data->product_id)->product_title}}</td>
                        <td>{{$sale_price = App\Models\Product::find($order_data->product_id)->sale_price}}</td>
                        <td>{{$quantity = $order_data->quantity}}</td>
                        <td>{{$order_data->created_at}}</td>
                        <td>{{$sub_total = $sale_price * $quantity}}</td>
                        @php
                            $total = $total + $sub_total;
                        @endphp
                    </tr>
                @endforeach
                

            </tbody>
        </table>
        <div class="" style="display: flex; justify-content:center">
            <span style="font-size: 25px; font-weight:bold;" class="">Total : {{ $total}}</span>
        </div>
    </div>
</div>
@endsection
@extends('layouts.dashboard_main')

@section('datatable-css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <table class="table table-hover" id="data_table">
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
                     
                        <td class="d-flex">
                            <a href="{{route('order.show',$order->id)}}"> <i class="fa fa-eye"></i></a>
                            <form action="{{route('product.order.delete',$order->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="fa-solid fa-trash-can ml-2" style="border: none"></button>
                            </form>
                        </td>

                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  
    <script>
        $(document).ready(function () {
            $('#data_table').DataTable();
        });
    </script>
    @endsection

@endsection
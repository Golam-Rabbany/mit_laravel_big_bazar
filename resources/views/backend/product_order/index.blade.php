@extends('layouts.dashboard_main')

@section('datatable-css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection

@section('content')

<table class="table" id="data_table">
    <thead class="thead-dark">
        <tr>
            <th>Id</th>
            <th>Order_User</th>
            <th>Product_Name</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Action</th>
          </tr>
    </thead>
    <tbody>
      @foreach ($data->ProductOrders as $product)
        <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{App\Models\Order::find($product->order_id)->name}}</td>
          <td>{{App\Models\Product::find($product->product_id)->product_title}}</td>
          <td>{{$product->quantity}}</td>
          <td>{{App\Models\Product::find($product->product_id)->sale_price}}</td>
          <td>
            <form action="{{route('product.order.delete',$product->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="fa-solid fa-trash-can" style="border: none"></button>
            </form>
        </td>
        </tr>
      @endforeach
      
    </tbody>
  </table>

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
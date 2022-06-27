@extends('layouts.dashboard_main')

@section('content')
<h2 style="color:brown"><span>View Store </span>/ <a href="{{route('store.create')}}"> Create Store</a></h2><br>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Store Product Name</th>
            <th>Store Main Image</th>
            <th>Store Product Image</th>
            <th>Offer Parcentage</th>
            <th>Quantity Way</th>
            <th>Action</th>
          </tr>
    </thead>
    <tbody>
        @foreach ($my_store as $store)
        <tr>
          <td>{{$store->id}}</td>
          <td>{{$store->store_name}}</td>
          <td>
            <img src="{{asset('uploads/store/'.$store->store_main_photo)}}" style="height: 100px; width:100px" alt="no image found">
          </td>
          <td>
            <img src="{{asset('uploads/store/'.$store->store_photo)}}" style="height: 100px; width:100px" alt="no image found">
          </td>
          <td>{{$store->offer}}</td>
          <td>{{$store->quantity_way}}</td>
          <td class="">
            <a href="{{route('store.edit',$store->id)}}" class="btn btn-primary btn-sm">Edit</a>
            <form action="{{route('store.destroy',$store->id)}}" class="d-inline" method="POST">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger btn-sm" type="submit">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      
    </tbody>
  </table>
@endsection
@extends('layouts.dashboard_main')

@section('content')
<h2 style="color:brown"><span>View Grocery </span>/ <a href="{{route('grocery.create')}}"> Create Grocery</a></h2><br>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Id</th>
            <th>Category</th>
            <th scope="col">Grocery Product Name</th>
            <th>Grocery Main Image</th>
            <th>Grocery Product Image</th>
            <th>Action</th>
          </tr>
    </thead>
    <tbody>
        @foreach ($my_grocery as $grocery)
        <tr>
          <td>{{$grocery->id}}</td>
          <td>{{App\Models\Category::find($grocery->category_id)->category_name}}</td>
          <td>{{$grocery->grocery_name}}</td>
          <td>
            <img src="{{asset('uploads/grocery/'.$grocery->grocery_main_photo)}}" style="height: 100px; width:100px" alt="no image found">
          </td>
          <td>
            <img src="{{asset('uploads/grocery/'.$grocery->grocery_photo)}}" style="height: 100px; width:100px" alt="no image found">
          </td>
          <td class="">
            <a href="{{route('grocery.edit',$grocery->id)}}" class="btn btn-primary btn-sm">Edit</a>
            <form action="{{route('grocery.destroy',$grocery->id)}}" class="d-inline" method="POST">
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
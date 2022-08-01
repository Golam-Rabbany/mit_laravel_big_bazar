@extends('layouts.dashboard_main')

@section('content')

@can('create')


<h2 style="color:brown"><span>View Category </span>/ <a href="{{route('category.create')}}"> Create Category</a></h2><br>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Category Name</th>
            <th>Category Image</th>
            <th>Created At</th>
            <th>Action</th>
          </tr>
    </thead>
    <tbody>
        @foreach ($categorys as $category)
        <tr>
          <td>{{$category->id}}</td>
          <td>{{$category->category_name}}</td>
          <td>
            <img src="{{asset('uploads/category/'.$category->category_photo)}}" style="height: 100px; width:100px" alt="no image found">
          </td>
          <td>{{$category->created_at}}</td>
          <td class="">
            <a href="{{route('category.edit',$category->id)}}" class="btn btn-primary btn-sm">Edit</a>
            <form action="{{route('category.destroy',$category->id)}}" class="d-inline" method="POST">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger btn-sm" type="submit">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      
    </tbody>
  </table>

    
@endcan

@endsection
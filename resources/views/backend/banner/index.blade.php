@extends('layouts.dashboard_main')

@section('content')
<h2 style="color:brown"><span>View Banner </span>/ <a href="{{route('banner.create')}}"> Create Banner</a></h2><br>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Banner Image</th>
            <th>Sub Banner Image</th>
            <th>Created At</th>
            <th>Action</th>
          </tr>
    </thead>
    <tbody>
        @foreach ($banner_datas as $banner_data)
        <tr>
          <td>{{$loop->iteration}}</td>
          <td>
            <img src="{{asset('uploads/banner/'.$banner_data->banner_photo)}}" style="height: 100px; width:100px" alt="no image found">
          </td>
          <td>
            <img src="{{asset('uploads/banner/'.$banner_data->sub_banner)}}" style="height: 100px; width:100px" alt="no image found">
          </td>
          <td>{{$banner_data->created_at}}</td>
          <td class="">
            <a href="{{route('banner.edit',$banner_data->id)}}" class="btn btn-primary btn-sm">Edit</a>
            <form action="{{route('banner.destroy',$banner_data->id)}}" class="d-inline" method="POST">
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
@extends('layouts.dashboard_main')

@section('content')
<h2 style="color:brown"><span>View Header </span>/ <a href="{{route('header.create')}}"> Create Header</a></h2><br>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Id</th>
            <th>Number</th>
            <th>Header Logo</th>
            <th>Social Logo</th>
            <th>Action</th>
          </tr>
    </thead>
    <tbody>
        @foreach ($headers as $header)
        <tr>
          <td>{{$header->id}}</td>
          <td>{{$header->number}}</td>
          <td>
            <img src="{{asset('uploads/header/'.$header->logo)}}" style="height: 100px; width:100px" alt="no image found">
          </td>
          <td>{{$header->social}}</td>
          <td class="">
            <a href="{{route('header.edit',$header->id)}}" class="btn btn-primary btn-sm">Edit</a>
            <form action="{{route('header.destroy',$header->id)}}" class="d-inline" method="POST">
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
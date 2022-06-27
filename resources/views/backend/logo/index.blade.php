@extends('layouts.dashboard_main')

@section('content')
<h2 style="color:brown"><span>View Logo </span>/ <a href="{{route('logo.create')}}"> Create Logo</a></h2><br>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Id</th>
            <th>Logo</th>
            <th>Action</th>
          </tr>
    </thead>
    <tbody>
        @foreach ($logos as $logo)
        <tr>
          <td>{{$logo->id}}</td>
          <td>
            <img src="{{asset('uploads/logo/'.$logo->logo)}}" style="height: 100px; width:100px" alt="no image found">
          </td>
          <td class="">
            <a href="{{route('logo.edit',$logo->id)}}" class="btn btn-primary btn-sm">Edit</a>
            <form action="{{route('logo.destroy',$logo->id)}}" class="d-inline" method="POST">
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
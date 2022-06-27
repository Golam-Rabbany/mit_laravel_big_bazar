@extends('layouts.dashboard_main')

@section('content')
<h2 style="color:brown"><span>View Subscribe Message</span></h2><br>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th>Id</th>
            <th>Logo</th>
            <th>Action</th>
          </tr>
    </thead>
    <tbody>
        @foreach ($subscribe as $subscribes)
        <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{$subscribes->subscribe_message}}</td>
          <td class="">
            <a href="{{route('subscribe.edit',$subscribes->id)}}" class="btn btn-primary btn-sm">Edit</a>
            <form action="{{route('subscribe.destroy',$subscribes->id)}}" class="d-inline" method="POST">
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
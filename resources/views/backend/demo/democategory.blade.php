@extends('layouts.dashboard_main')


@section('content')
    <h2>Demo Category</h2>
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{session()->get('message')}}
    </div>
        
    @endif
    <form action="{{route('demo.store')}}" method="POST">
        @csrf
        <div class="mt-3">
            <label class="form-label" for="">Add Category</label>
            <input type="text" class="form-control" name="category">
            @error('category')
                <p class="text text-danger">{{$message}}</p>
            @enderror
            
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>
@endsection
@extends('layouts.dashboard_main')


@section('content')
    <h2>Demo Product</h2>
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{session()->get('message')}}
    </div>
        
    @endif
    <form action="{{route('demoproduct.store')}}" method="POST">
        @csrf
        <div class="mt-3">
            <label class="form-label">Category</label>
            <select name="category_id" id="democategory" class="form-control">
                <option value="">-----select----</option>
                @foreach (App\Models\Demo::all() as $data)
                <option value="{{$data->id}}">{{$data->category}}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-3">
            <label class="form-label" for="">Add Product</label>
            <input type="text" class="form-control" name="demoproduct">
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>
@endsection
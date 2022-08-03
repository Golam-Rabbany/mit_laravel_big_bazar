{{-- clik category to show all product  --}}


@extends('layouts.frontend_main')
@section('content')

<section id="product">
    <h4 class="mb-2" style="font-size:27px; text-align: center;">Featured Products</h4>
    <div class="container">
      <div class="row">
           @forelse ($alldata->product as $data )
           <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-6 mt-4">
            <div class="card product-card" style="width: 15rem;">
                <img src="{{asset('uploads/product/'.$data->product_photo)}}" class="card-img-top" alt="...">
                <div class="card-body product-body" >
                <div class="d-flex mb-2 justify-between" style="margin-bottom: -2rem;">
                    <span><a href="{{route('singleProduct',$data->sku)}}">{{$data->product_title}}</a></span>
                    <div class="float-end ml-3">
                    <span style="color:red">$</span><span  style="color:red"><s>{{$data->main_price}}</s></span>
                    <span class="ml-1">$</span><span>{{$data->sale_price}}</span>
                    </div> 
                </div>
                <div class="product-selece mb-2">
                    <select name="" class="form-control" id="">
                    <option value="">----Please Select-----</option>
                    <option value="">1kg</option>
                    <option value="">4kg</option>
                    <option value="">9kg</option>
                    </select>
                </div>
                <div class="d-flex">
                    <label for="" class="" >Qty</label>
                    <input type="number" value="1" class="product-input ml-3">
                    <button class="product-button ml-4">Add</button>
                </div>
                </div>
                
            </div>
          </div>
          @empty
          <span class="text-danger d-flex justify-center fs-4 ">No Data Here</span>
           @endforelse
       

      </div>
    </div>
</section>

@endsection
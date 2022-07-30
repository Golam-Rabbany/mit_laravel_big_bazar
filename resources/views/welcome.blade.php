@extends('frontend.layouts.master')
@section('content')
  <section id="owl-carousel-id">
      <div class="owl-carousel owl-banner owl-theme">
        @foreach (App\Models\Banner::whereNotNull('banner_photo')->get() as $banner)
        <div class="item">
          <img src="{{asset('uploads/banner/'.$banner->banner_photo)}}" alt="">
        </div>
        @endforeach
      </div>
  </section> 
  
  <section class="mt-4">
    <div class="container">
      <div class="row">
      <div class="owl-carousel owl-sub-banner owl-theme">
        @foreach (App\Models\Banner::whereNotNull('sub_banner')->get() as $banner)
        <div class="item">
          <div class="sub-banner-span sub-banner-span2">
            <span>Get </span><span style="font-weight: bold;">Chana Dal</span><br>
            <span class="sub-banner-span-body1">@ </span><span class="sub-banner-span-body2">20</span><span class="sub-banner-span-body3">$</span><br>
            <span>Shop for </span><span>$</span><span>500</span>
          </div>
          <img src="{{asset('uploads/banner/'.$banner->sub_banner)}}" alt="">
        </div>
        @endforeach
      </div>
    </div>
    </div>
  </section>
  
  
  <section id="choose">
    <div class="container">
      <div class="row choose-row">
        <div class="col-lg-3 mb-2">
          <div class="mx-auto">
            <h3 class="text-xl">Why choose us?</h3>
          </div>
        </div>
        <div class="col-lg-3 mb-2 mx-auto">
          <div class="choose-body d-flex">
            <i class="fa-solid fa-clock"></i>
            <div class="choose-text" >
            <p>On time delivery</p>
            <p>15% back if not able</p>
          </div>
        </div>
        </div>
        <div class="col-lg-3 mb-2 mx-auto">
          <div class="choose-body d-flex">
          <i class="fa-solid fa-plane-departure"></i>
          <div class="choose-text" >
            <p>Free delivery</p>
            <p>Order over $ 200</p>
          </div>
        </div>
        </div>
        <div class="col-lg-3 mb-2">
          <div class="choose-body d-flex">
            <i class="fa-solid fa-circle-check"></i>
            <div class="choose-text">
              <p>Quality assurance</p>
              <p>You can trust us</p>
            </div>
          </div>
        </div>
  
      </div>
    </div>
  </section>
  
  
  <section id="category">
    <h4 class="mb-2" style="text-align: center;">Top Categories</h4>
    <div class="container">
      <div class="row justify-content-center">
        @foreach (App\Models\Category::all() as $category)
        <div class="col-sm-12 col-md-4 col-lg-3 col-xl-2 p-2">
          <div class="category-body category-col ">
            <h6 class="text-center text-align-center">{{$category->category_name}}</h6>
            <div class="w-100 d-flex justify-content-center">
              <a href="{{route('product.allproduct',$category->id)}}" style="text-decoration: none;">
                <img class="mx-auto" src="{{asset('uploads/category/'.$category->category_photo)}}" alt="">
              </a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  
  
  <section id="product">
    <h4 class="mb-2" style="text-align: center;">Featured Products</h4>
    <div class="container">
      <div class="row">
        @foreach (App\Models\Product::all() as $product)
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-6 mt-4">
          <div class="card product-card" style="width: 15rem;">
          <a href="{{route('product.details',$product->id)}}" style="text-decoration: none">
            <img src="{{asset('uploads/product/'.$product->product_photo)}}" class="card-img-top" alt="...">
          </a>
            <div class="card-body product-body" >
              <div class="d-flex mb-2 justify-between" style="margin-bottom: -2rem;">
                <span>{{$product->product_title}}</span>
                <div class="float-end ml-3">
                  <span style="color:red">$</span><span  style="color:red"><s>{{$product->main_price}}</s></span>
                  <span class="ml-1">$</span><span>{{$product->sale_price}}</span>
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
              <form action="{{route('cart.store')}}" method="POST">
                @csrf

                <input type="hidden" name="product_id" value="{{$product->id}}">
                  <input type="hidden" name="product_title" value="{{$product->product_title}}">
                  <input type="hidden" name="sale_price" value="{{$product->sale_price}}">

                <div class="d-flex justify-content-between">
                  <div>
                    <input type="number" name="quantity" value="1" class="product-input pl-2 mt-2">
                  </div>
                  <div class="">
                    <button type="submit" class="btn-sm product-button mt-2">Add</button>
                  </div>

                </div>
              </form>
            </div>
            
          </div>
        </div>        
        @endforeach
      </div>
    </div>
  </section>
  
  
  <section id="fruit">
    <h4 class="mb-2"  style="text-align: center;">Fruits Store</h4>
    <div class="container">
      <div class="row ">
        @foreach (App\Models\Store::whereNotNull('store_main_photo')->get() as $store)
        <div class="col-lg-3 col-sm-12 col-md-12 ">
          <img class="d-flex mt-3" style="margin: 0 auto;" src="{{asset('uploads/store/'.$store->store_main_photo)}}" alt="">
        </div>
        @endforeach
        <div class="col-lg-9 fruit-body">
          <div class="row  d-flex">
          @foreach (App\Models\Store::all() as $store)
            <div class="col-lg-4 col-md-4 col-sm-6 ">
              @if($store->offer)
              <a href="{{route('single.store',$store->id)}}">
              <div class="fruit-img">
                
                <img src="{{asset('frontend/asset/img/salebg.png')}}" alt="" style="position: absolute; top:0; right:24px">
                <p class="tag" style="margin-right: 10px;">
                  {{$store->offer}}<br>{{$store->quantity_way}}<br>off
                </p>
                <h5 class="">{{$store->store_name}}</h5>
                <img class="d-flex mx-auto" src="{{asset('uploads/store/'.$store->store_photo)}}" alt="">
              </div>
            </a>
              @else
              <a href="{{route('single.store',$store->id)}}">
              <div class="fruit-img">
                <h5 class="">{{$store->store_name}}</h5>
                <img class="d-flex mx-auto" src="{{asset('uploads/store/'.$store->store_photo)}}" alt="">
              </div>
              </a>
              @endif
            </div>   
          @endforeach
         
        </div>
        </div>
        <div  class="fruit-button">
          <button>View All</button>
        </div>
      </div>
    </div>
  </section>
  
  
  <section id="grocery">
    <h4 class="mb-2"  style="text-align: center;">Grocery & Staples</h4>
    <div class="container">
      <div class="row ">
        @foreach (App\Models\Grocery::whereNotNull('grocery_main_photo')->get() as $grocery)
        <div class="col-lg-3 col-sm-12 col-md-12 ">
          <img class="d-flex mt-3" style="margin: 0 auto;" src="{{asset('uploads/grocery/'.$grocery->grocery_main_photo)}}" alt="">
        </div>
        @endforeach
        <div class="col-lg-9 grocery-body">
        <div class="row  d-flex">
          @foreach (App\Models\Grocery::whereNotNull('grocery_photo')->get() as $grocery)
          <div class="col-lg-4 col-md-4 col-sm-6 ">
            <div class="grocery-img mb-3">
              <a href="{{route('singleGrocery',$grocery->slug)}}">
              <h5 class="">{{$grocery->grocery_name}}</h5>
              <img class="d-flex mx-auto" src="{{asset('uploads/grocery/'.$grocery->grocery_photo)}}" alt="">
              </a>
            </div>
          </div>
          @endforeach
        </div>
        </div>
        <div  class="grocery-button">
          <button>View All</button>
        </div>
      </div>
    </div>
  </section>


  <section id="category">
    <h4 class="mb-2" style="text-align: center;">Demo Categories</h4>
    <div class="container">
      <div class="row justify-content-center">
        @foreach (App\Models\Demo::all() as $dem)
        <div class="col-sm-12 col-md-4 col-lg-3 col-xl-2 p-2">
          <div class="category-body category-col ">
            <a href="{{route('demo.product',$dem->id)}}">
              <h6 class="text-center text-align-center">{{$dem->category}}</h6>
            </a>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  
  
  <section id="popular">
    <h4 class="mb-2" style="text-align: center;">Our Popular Brands</h4>
    <div class="container">
      <div class="owl-carousel owl-carousel-brand owl-theme">
        @foreach (App\Models\Logo::all() as $logos)
        <div class="item">
          <img src="{{asset('uploads/logo/'.$logos->logo)}}" alt="">
        </div>        
        @endforeach
      </div>
    </div>
  </section>

@endsection
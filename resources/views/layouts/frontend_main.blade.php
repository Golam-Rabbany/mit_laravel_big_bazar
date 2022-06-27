
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Big Bazar</title>

    <!-- add css -->
    <link rel="stylesheet" href="{{asset('frontend/asset/style.css')}}">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- owl carousel -->
  <link
  rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css" integrity="sha512-T584yQ/tdRR5QwOpfvDfVQUidzfgc2339Lc8uBDtcp/wYu80d7jwBgAxbyMh0a9YM9F8N3tdErpFI8iaGx6x5g==" crossorigin="anonymous" referrerpolicy="no-referrer"/>

  {{-- tailwind --}}
  <script src="https://cdn.tailwindcss.com"></script>
<style>
  @media (min-width: 992px) {
    .col-lg-1\/5 {
      -ms-flex: 0 0 20%;
      flex: 0 0 20%;
      max-width: 20%;
    }
  }
</style>


</head>
<body>


  @php
    $header = App\Models\Header::first();
  @endphp


<section class="mb-3">
    <div class="container flex justify-between" style="border-bottom: 0.5px solid rgb(224, 224, 224)" >
      <div class="mt-2 mb-2">
        <ul class="flex">
          <li class="px-2 py-1 text-sm"><a href=""><i class="fa-solid fa-flag"></i><span> Country</span></a></li>
          <li class="px-2 py-1 text-sm"><a href=""><i class="fa-solid fa-indian-rupee-sign"></i><span> Currency</span></a></li>
        </ul>
      </div>
      <div class="mt-2 mb-2">
        <ul class="flex">
          <li class="px-2 py-1 text-sm"><a href=""><i class="fa-solid fa-phone"></i><span> {{$header->number}}</span></a></li>
          <li class="px-2 py-1 text-sm"><a href="{{route('login')}}"><i class="fa-solid fa-person-breastfeeding"></i><span> Login</span></a></li>
          <li class="px-2 py-1 text-sm"><a href="{{route('register')}}"><i class="fa-solid fa-user-plus"></i><span> Sign Up</span></a></li>
        </ul>
      </div>
    </div>
</section>
{{-- <svg  id="icon"   xmlns="http://www.w3.org/2000/svg" class="h-6 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
  <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
</svg> --}}


<section id="header">
  <div class="container flex justify-between">
    <div class="items-center mr-2">
      <img src="{{asset('uploads/header/'.$header->logo) }}" alt="not found">
    </div>
    <div class="header-nav flex bg-slate-300 items-center px-2 py-2 mr-2 rounded mb-3">
      <p class="leading-6">Shop by<br>category</p>
      <i class="fa fa-bars ml-3 px-3 py-0.5 rounded text-3xl text-gray-50" style="background-color: #84c225"></i> 

    </div>
    <div class="header-search mr-2">
      <div class="block">
        <div class="flex items-center">
          <input type="text" id="search-input" name="search" placeholder="Search" class="header-input md:w-20 border-1 outline-none rounded-sm  focus:ring focus:ring-violet-100  p-[8px] " style="width: 30rem" autocomplete="off">
          <i class="fa-solid fa-magnifying-glass p-[14px] cursor-pointer rounded-r text-gray-50" style="background-color: #84c225;"></i>
        </div>
        <div class="flex text-uppercase my-1"> 
          <div class="items-center mr-4"><i class="fa-regular fa-id-badge text-amber-600"></i><span class="text-amber-500"> bm offere</span></div>
          <div class="items-center mr-4"><i class="fa-solid fa-certificate text-purple-600"></i><span class="text-purple-600"> bm express</span></div>
          <div class="items-center mr-4"><i class="fa-regular fa-id-badge text-green-500"></i><span  class="text-green-500"> bm speciality</span></div>
          <div class="items-center mr-4"><i class="fa-solid fa-sack-dollar text-blue-600"></i><span class="text-blue-600"> bm store</span></div>
        </div>
      </div>
    </div>
    <div class="header-last flex bg-slate-300 items-center px-2 py-2 mr-2 rounded mb-3">
      <i class="fa-solid fa-basket-shopping text-5xl py-1" style="color: #84c225;"></i>
      <p class="leading-6 ml-3">My Basket <br>Item 2</p>
    </div>

    <div class="block md:hidden cursor-pointer"  >
      <svg  id="icon"   xmlns="http://www.w3.org/2000/svg" class="h-6 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
       <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
     </svg>
</div>
  </div>
</section>


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
      @foreach ($alldata as $category)
      <div class="col-sm-12 col-md-4 col-lg-3 col-xl-2 p-2">
        <div class="category-body category-col ">
          <h6 class="text-center text-align-center">{{$category->category_name}}</h6>
          <div class="w-100 d-flex justify-content-center">
            <img class="mx-auto" src="{{asset('uploads/category/'.$category->category_photo)}}" alt="">
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
          <img src="{{asset('uploads/product/'.$product->product_photo)}}" class="card-img-top" alt="...">
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
            <div class="d-flex">
              <label for="" class="" >Qty</label>
              <input type="number" value="{{$product->quantity}}" class="product-input ml-3">
              <button class="product-button ml-4">Add</button>
            </div>
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
          <div class="fruit-img">
            <p class="tag" style="margin-right: 10px;">
              {{$store->offer}}<br>{{$store->quantity_way}}<br>off
            </p>
            <h5 class="">{{$store->store_name}}</h5>
            <img class="d-flex mx-auto" src="{{asset('uploads/store/'.$store->store_photo)}}" alt="">
          </div>
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
          <div class="grocery-img">
            <h5 class="">{{$grocery->grocery_name}}</h5>
            <img class="d-flex mx-auto" src="{{asset('uploads/grocery/'.$grocery->grocery_photo)}}" alt="">
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


<section id="footer">
  <div class="container">
    <div class="row footer-row">
      <div class="col-sm-6 col-xs-6 col-md-4 col-lg-1/5 mb-3">
        <h4>My Account</h4>
        <ul style="padding: 0;">
          <li><a href="">My Account</a></li>
          <li><a href="">Order History</a></li>
          <li><a href="">Wish List</a></li>
          <li><a href="">Newsletter</a></li>
          <li><a href="">Contact Us</a></li>
        </ul>
      </div>
      <div class="col-sm-6 col-xs-6 col-md-4 col-lg-1/5 mb-3">
        <h4>Information</h4>
        <ul style="padding: 0;">
          <li><a href="">About Us</a></li>
          <li><a href="">Delevary Information</a></li>
          <li><a href="">Privacy Policy</a></li>
          <li><a href="">Termas & Conditions</a></li>
          <li><a href="">Returns</a></li>
        </ul>
      </div>
      <div class="col-sm-6 col-xs-6 col-md-4 col-lg-1/5 mb-3">
        <h4>Customlink</h4>
        <ul style="padding: 0;">
          <li><a href="">Career</a></li>
          <li><a href="">About Us</a></li>
          <li><a href="">Policy</a></li>
          <li><a href="">Newsletter</a></li>
          <li><a href="">Contact Us</a></li>
        </ul>
      </div>
      <div class="col-sm-6 col-xs-6 col-md-4 col-lg-1/5 mb-3">
        <h4>Extras</h4>
        <ul style="padding: 0;">
          <li><a href="">Brands</a></li>
          <li><a href="">Gift Certificate</a></li>
          <li><a href="">Affilieats</a></li>
          <li><a href="">Specials</a></li>
          <li><a href="">Site Maps</a></li>
        </ul>
      </div>
      <div class="col-sm-6 col-xs-6 col-md-4 col-lg-1/5 mb-3">
        <h4>Contacts</h4>
        <ul style="padding: 0;">
          <li><a href="">600, Big market Site Designs</a></li>
          <li><a href="">custom Boltacusta avenue apt.</a></li>
          <li><a href="">Mesa,California</a></li>
          <li><a href="">info@customdesign.com</a></li>
          <li><a href="">(+91) 12-3456-7890</a></li>
        </ul>
      </div>
    </div>
  </div>
</section>


<section id="subscribe">
  <div class="container">
    <div class="row subscribe-row">
      <div class="d-flex justify-content-between align-items-center subscribe-body">
          <div class="d-flex subscribe-body-text">
            <h3 class="">Subscribe for our offer news</h3>
          </div>
          <form action="{{route('subscribe.store')}}" method="POST">
            @csrf
          <div class="d-flex subscribe-body-input">
            <input class="form-control " type="email" name="subscribe_message" id="" placeholder="Enter your email address">
            <button class="btn subscribe-btn">Subscribe</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>


<section id="payment">
  <div class="container">
    <div class="row row-payment d-flex">
      <div class="col-lg-4  payment-col mb-3" >
        <h4 class="" style="text-align: center;">Payment Option</h4>
        <ul class="d-flex justify-content-center payment-card">
          <li><a href=""><i class="fa-brands fa-cc-mastercard"></i></a></li>
          <li><a href=""><i class="fa-brands fa-cc-discover"></i></a></li>
          <li><a href=""><i class="fa-brands fa-cc-amex"></i></a></li>
          <li><a href=""><i class="fa-brands fa-cc-paypal"></i></a></li>
          <li><a href=""><i class="fa-brands fa-cc-visa"></i></a></li>
        </ul>
      </div>
      <div class="col-lg-4 payment-col mb-3" >
        <h4 class=" mb-4" style="text-align: center;">Download App</h4>
        <ul class="d-flex justify-content-center payment-app">
          <li><a href=""><img src="frontend/asset/img/app-store.png" alt=""></a></li>
          <li><a href=""><img src="frontend/asset/img/play-store.png" alt=""></a></li>
        </ul>
      </div>
      <div class="col-lg-4 payment-col mb-3" >
        <h4 class="mb-4" style="text-align: center;">Social Media</h4>
        <ul class="d-flex justify-content-center payment-logo">
          @foreach (App\Models\Header::whereNotNull('social')->get() as $social)
          <li><a href=""><i class="{{$social->social}}"></i></a></li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</section>

<section id="last-footer">
  <div class="container">
    <div class="row last-footer-row">
      <h6>Powered By OpenCart Big-market © 2022</h6>
    </div>
  </div>
</section>






  <!-- bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script
  src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
  integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"
></script>

<script>
    $('.owl-banner').owlCarousel({
      loop: true,
      margin: 10,
      nav: true,
      dots: true,
      autoplay: true,
      responsive: {
        0: {
          items: 1,
        },
        300: {
          items: 1,
        },
        600: {
          items: 1,
        },
        1000: {
          items: 1,
        },
      },
    });
</script>

<script>
  $('.owl-sub-banner').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    dots: true,
    autoplay: true,
    responsive: {
      0: {
        items: 2,
      },
      300: {
        items: 2,
      },
      600: {
        items: 2,
      },
      1000: {
        items: 2,
      },
    },
  });
</script>


<script>
  $('.owl-carousel-brand').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:2
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
    })
</script>






</body>
</html>
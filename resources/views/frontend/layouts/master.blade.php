
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Big Bazar</title>
    <link rel="shortcut icon" href="{{asset('frontend/asset/img/logo_main.png')}}" type="image/x-icon">

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

{{-- sweet alert2 --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>

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


<section id="header">
    <div class="container flex justify-between">
      <div class="items-center mr-2">
        <img src="{{asset('uploads/header/'.$header->logo) }}" class="img-fluid mb-2" alt="not found">
      </div>
      <div class="header-nav flex bg-slate-300 items-center px-2 py-2 mr-2 rounded mb-3">
        <p class="leading-6">Shop by<br>category</p>
        <i class="fa fa-bars ml-3 px-3 py-0.5 rounded text-2xl text-gray-50" style="background-color: #84c225"></i> 
  
      </div>
      <div class="header-search mr-2">
        <div class="block">
          <div class="flex items-center">
            <input type="text" id="search-input" name="search" value="" placeholder="Search" class="form-control input-lg" autocomplete="off">            <i class="fa-solid fa-magnifying-glass p-[11px] cursor-pointer rounded-r text-gray-50" style="background-color: #84c225;"></i>
          </div>
          <div id="search-bm" class="flex text-uppercase my-1"> 
            <div class="items-center mr-4"><i class="fa-regular fa-id-badge text-amber-600"></i><span class="text-amber-500"> bm offere</span></div>
            <div class="items-center mr-4"><i class="fa-solid fa-certificate text-purple-600"></i><span class="text-purple-600"> bm express</span></div>
            <div class="items-center mr-4"><i class="fa-regular fa-id-badge text-green-500"></i><span  class="text-green-500"> bm speciality</span></div>
            <div class="items-center mr-4"><i class="fa-solid fa-sack-dollar text-blue-600"></i><span class="text-blue-600"> bm store</span></div>
          </div>
        </div>
      </div>
      <div class="header-last flex bg-slate-300 items-center px-2 py-2 mr-2 rounded mb-3">
        <i class="fa-solid fa-basket-shopping text-3xl py-1" style="color: #84c225;"></i>
       
        <a href="{{route('cart.add')}}">
          <p class="leading-6 ml-3">My Basket <br>Item <span>@if(Session::has('cart')){{count(Session::get('cart'))}}@else 0 @endif</span></p>
     
        </a>
      </div>

    </div>
</section>


@yield('content')

@include('frontpage.frontendfooter')


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



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
        <p class="leading-6 ml-3">My Basket <br></p>
      </div>
  
      <div class="block md:hidden cursor-pointer"  >
        <svg  id="icon"   xmlns="http://www.w3.org/2000/svg" class="h-6 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
         <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
       </svg>
    </div>
    </div>
  </section>
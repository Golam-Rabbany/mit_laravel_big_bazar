@extends('frontend.layouts.master')


@section('content')

<section id="cart-page">
    <div class="container">
        <div class="row">
            <div class="col-5">
                <div class="d-flex justify-content-center align-items-center border">
                    <img class="" src="{{asset('uploads/product/1656573359.jpg')}}" alt="">
                </div>
            </div>
            <div class="col-7">
                <div class="d-block border-bottom pb-4">
                    <div class="d-block">
                        <div>
                            <h1 style="font-size: 25px">Apple</h1>
                        </div>
                        <div class="d-flex mt-3">
                            <span class="fs-5 mr-3"><s>$90</s></span> <span class="fs-3">$80</span>
                        </div>
                        <div class="mt-3">
                            <span>Category: </span><span>Fruits</span>
                        </div>
                        <div class="mt-2">
                            <span>Product Code: </span><span>#432sfas</span>
                        </div>
                        <div class="mt-2">
                            <span class="text-danger">In Stock</span>
                        </div>
                    </div>
                </div>

                <div class="d-block border-bottom py-2">
                    <div class="d-block">
                        <div class="d-flex">
                            <span class="mt-2">Package Size</span>
                        </div>
                        <div class="mt-2">
                            <div>
                                <input type="radio" name="" id="">
                                <label for="">20 kg</label>
                            </div>
                            <div>
                                <input type="radio" name="" id="">
                                <label for="">250 kg</label>
                            </div>
                        </div>
                        <div class="d-flex mt-2">
                            <span class="py-2 mr-2">Qty</span>
                            <input style="width: 50px!important" type="number" value="1">
                            <button class="border py-2 px-20 ml-3 fs-7  " style="background: rgb(165, 8, 249); color:wheat; text-transform:uppercase; ">Add</button>
                            <i class="fa-solid fa-heart fs-4  d-flex justify-content-center align-items-center px-3 ml-3" style="background: rgb(21, 20, 110); color:red; border-radius:5px; cursor: pointer;"></i>
                        </div>
                        <div class="d-flex mt-2">
                            <span class="d-flex align-items-center mr-3">Share: </span>
                            <i class="p-2 text-info cursor-pointer mr-2 fs-4 fa-brands fa-facebook-f"></i>
                            <i class="p-2 text-info cursor-pointer mr-2 fs-4 fa-brands fa-twitter"></i>
                            <i class="p-2 text-info cursor-pointer mr-2 fs-4 fa-brands fa-instagram"></i>
                            <i class="p-2 text-info cursor-pointer mr-2 fs-4 fa-brands fa-github"></i>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="container mt-5">
    <div class="text-center">
        <ul class="nav nav-pills mb-3 py-3 justify-center bg-slate-50 " id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Information</button>
            </li>
            <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Description</button>
            </li>
            <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Review</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade active show" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                dfapjof oweiajwre adfjeiou weijdfapjof oweiajwre adfjeiou sgfsdagweijdfapjof oweiajwre adfjeiou weijdfapjof oweiajwre adfjeiou weijdfapjof oweiajwre adfjeiou weij
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
               fduahio  ahfudafuie asiudfhewihfahefi aiufhaiehfefduahio  ahfudafuie asiudfhewihfahefi aiufhaiehfe
            </div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">Suna ki jasse</div>
        </div>
    </div>
</section>


@endsection
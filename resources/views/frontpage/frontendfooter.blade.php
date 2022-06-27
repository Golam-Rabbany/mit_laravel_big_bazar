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
                <li><a href=""><img src="{{asset('frontend/asset/img/app-store.png')}}" alt=""></a></li>
                <li><a href=""><img src="{{asset('frontend/asset/img/play-store.png')}}" alt=""></a></li>
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
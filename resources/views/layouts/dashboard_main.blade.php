

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('backend/dashboard/images/img.jpg') }}" type="image/ico" />

    <title>Big Bazar Dashboard | </title>

    <!-- Bootstrap -->
    <link href="{{ asset('backend/dashboard/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('backend/dashboard/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('backend/dashboard/css/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('backend/dashboard/css/green.css') }}" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="{{ asset('backend/dashboard/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ asset('backend/dashboard/css/jqvmap.min.css') }}" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('backend/dashboard/css/daterangepicker.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('backend/dashboard/css/custom.min.css') }}" rel="stylesheet">

    <!----fontawesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="nav-md">
     <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="{{ asset('uploads/profile/'.Auth::user()->profile_photo) }}" alt="..."
                                class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>{{Auth::user()->name}}</h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                                    </ul>
                                </li>

                                <li><a href="{{route('order.index')}}"><i class="fa-solid fa-arrow-up-9-1"></i>&emsp;Orders</a></li>

                                <li><a><i class="fa fa-table"></i>Banner<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{route('banner.index')}}">View Banner</a></li>
                                        <li><a href="{{route('banner.create')}}">Create Banner</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-table"></i>Category<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{route('category.index')}}">View Category</a></li>
                                        <li><a href="{{route('category.index')}}">Create Category</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-edit"></i>Product <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{route('product.index')}}">View Product</a></li>
                                        <li><a href="{{route('product.create')}}">Create Product</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-desktop"></i> Store <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{route('store.index')}}">View Store</a></li>
                                        <li><a href="{{route('store.create')}}">Create Store</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-table"></i>Grocery<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{route('grocery.index')}}">View Grocery</a></li>
                                        <li><a href="{{route('grocery.create')}}">Create Grocery</a></li>
                                    </ul>
                                </li>

                                <li><a><i class="fa fa-table"></i>Header<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{route('header.index')}}">View Header</a></li>
                                        <li><a href="{{route('header.create')}}">Create Header</a></li>
                                    </ul>
                                </li>
                                                                
                                <li><a><i class="fa fa-table"></i>Logo Brands<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{route('logo.index')}}">Brand View</a></li>
                                        <li><a href="{{route('logo.create')}}">Brand Create</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{route('subscribe.index')}}"><i class="fa fa-clone"></i>View Subscribe Message</a>
                                </li>
                            </ul>
                        </div>

                    </div>

                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav">
                        <ul class=" navbar-right">
                            <li class="nav-item dropdown open" style="padding-left: 15px;">
                                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true"
                                    id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('uploads/profile/')}}/{{Auth::User()->profile_photo}} " alt="">{{Auth::User()->name}}
                                </a>
                                <div class="dropdown-menu dropdown-usermenu pull-right"
                                    aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="javascript:;"> Profile</a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <span class="badge bg-red pull-right">50%</span>
                                        <span>Settings</span>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">Help</a>
                                    <a href="">
                                      <form method="POST" action="{{ route('logout') }}" style="margin-bottom: 3rem; ">
                                          @csrf
                                          <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                              this.closest('form').submit();">
                                              {{ __('Log Out') }}
                                          </x-dropdown-link>
                                      </form>
                                    </a>  
                                </div>
                            </li>

                            <li role="presentation" class="nav-item dropdown open">
                                <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1"
                                    data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="badge bg-green">6</span>
                                </a>
                                <ul class="dropdown-menu list-unstyled msg_list" role="menu"
                                    aria-labelledby="navbarDropdown1">
                                    <li class="nav-item">
                                        <a class="dropdown-item">
                                            <span class="image"><img src="images/img.jpg"
                                                    alt="Profile Image" /></span>
                                            <span>
                                                <span>John Smith</span>
                                                <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                                Film festivals used to be do-or-die moments for movie makers. They were
                                                where...
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dropdown-item">
                                            <span class="image"><img src="images/img.jpg"
                                                    alt="Profile Image" /></span>
                                            <span>
                                                <span>John Smith</span>
                                                <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                                Film festivals used to be do-or-die moments for movie makers. They were
                                                where...
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dropdown-item">
                                            <span class="image"><img src="images/img.jpg"
                                                    alt="Profile Image" /></span>
                                            <span>
                                                <span>John Smith</span>
                                                <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                                Film festivals used to be do-or-die moments for movie makers. They were
                                                where...
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dropdown-item">
                                            <span class="image"><img src="images/img.jpg"
                                                    alt="Profile Image" /></span>
                                            <span>
                                                <span>John Smith</span>
                                                <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                                Film festivals used to be do-or-die moments for movie makers. They were
                                                where...
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <div class="text-center">
                                            <a class="dropdown-item">
                                                <strong>See All Alerts</strong>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->
            <div class="right_col" role="main">
            @yield('content')
            </div>
            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('backend/dashboard/js/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('backend/dashboard/js/bootstrap.bundle.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('backend/dashboard/js/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('backend/dashboard/js/nprogress.js') }}"></script>
    <!-- Chart.js -->
    <script src="{{ asset('backend/dashboard/js/Chart.min.js') }}"></script>
    <!-- gauge.js -->
    <script src="{{ asset('backend/dashboard/js/gauge.min.js') }}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ asset('backend/dashboard/js/bootstrap-progressbar.min.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('backend/dashboard/js/icheck.min.js') }}"></script>
    <!-- Skycons -->
    <script src="{{ asset('backend/dashboard/js/skycons.js') }}"></script>
    <!-- Flot -->
    <script src="{{ asset('backend/dahboard/js/jquery.flot.js') }}"></script>
    <script src="{{ asset('backend/dahboard/js/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('backend/dahboard/js/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('backend/dahboard/js/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('backend/dahboard/js/jquery.flot.resize.js') }}"></script>
    <!-- Flot plugins -->
    <script src="{{ asset('backend/dahboard/js/jquery.flot.orderBars.js') }}"></script>
    <script src="{{ asset('backend/dahboard/js/jquery.flot.spline.min.js') }}"></script>
    <script src="{{ asset('backend/dahboard/js/curvedLines.js') }}"></script>
    <!-- DateJS -->
    <script src="{{ asset('backend/dahboard/js/date.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('backend/dahboard/js/jquery.vmap.js') }}"></script>
    <script src="{{ asset('backend/dahboard/js/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('backend/dahboard/js/jquery.vmap.sampledata.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('backend/dahboard/js/') }}moment.min.js"></script>
    <script src="{{ asset('backend/dahboard/js/daterangepicker.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('backend/dashboard/js/custom.min.js') }}"></script>

</body>

</html>

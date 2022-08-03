@extends('layouts.dashboard_main')

@section('content')
    <!-- page content -->

        <!-- top tiles -->
        <div class="row" style="display: inline-block;">
            <div class=" d-flex tile_count">
                <div class="tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Total User</span>
                    <div class="count">{{App\Models\User::count()}}</div>
                </div>
                <div class="tile_stats_count">
                    <a href="{{route('order.user_order')}}">  {{--class= "col-md-2 col-sm-4"   --}}
                    <span class="count_top"><i class="fa fa-user"></i> Your Orders</span>
                    <div class="count">{{App\Models\Order::count()}}</div>
                </a>
                </div>
                <div class="tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Total Categories</span>
                    <div class="count">{{App\Models\Category::count()}}</div>
                </div>
                <div class="tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Total Product</span>
                    <div class="count">{{App\Models\Product::count()}}</div>
                </div>


            </div>
        </div>
        <!-- /top tiles -->


@endsection

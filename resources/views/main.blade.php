<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    @include('head')
</head>


<body class="style-14 index-3">
    <!--[if lt IE 7]>
 <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
 <![endif]-->
    <!-- Start Loading -->
    <section class="loading-overlay">
        <div class="Loading-Page">
            <h1 class="loader">Loading...</h1>
        </div>
    </section>
    <!-- End Loading  -->

    <!-- start header -->
    <header>
        <!-- Top bar starts -->
        <div class="top-bar">
            <div class="container">

                <!-- Shopping kart starts -->
                <div class="tb-shopping-cart pull-right">
                    <!-- Link with badge -->
                    <a href="http://ntshop1.test/carts" class="btn btn-white btn-xs"><i class="fa fa-shopping-cart"></i> <i
                            class=" color"></i> <span class="badge badge-color">{{ \Session::get('carts') == null ? '': count(\Session::get('carts')) }}</span></a>
                    <!-- Dropdown content with item details -->
                </div>
                <!-- Shopping kart ends -->

                <!-- Search section for responsive design -->
                <div class="tb-search pull-left">
                    <a href="#" class="b-dropdown"><i
                            class="fa fa-search square-2 rounded-1 bg-color white"></i></a>
                    <div class="b-dropdown-block">
                        <form>
                            <!-- Input Group -->
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Type Something">
                                <span class="input-group-btn">
                                    <button class="btn btn-color" type="button">Search</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Search section ends -->
                <div class="clearfix"></div>
            </div>
        </div>

        <!-- Top bar ends -->

        <!-- Header One Starts -->
        <div class="header-1">

            <!-- Container -->
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <!-- Logo section -->
                        <div class="logo">
                            <h1><a href="http://ntshop1.test/"><i class="fa fa-bookmark-o"></i> NTech Shop</a></h1>
                        </div>
                    </div>
                    <div class="col-md-6 col-md-offset-2 col-sm-5 col-sm-offset-3 hidden-xs">
                        <!-- Search Form -->
                        <div class="header-search">
                            <form>
                                <!-- Input Group -->
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Tìm sản phẩm">
                                    <span class="input-group-btn">
                                        <button class="btn btn-color" type="button">Tìm kiếm</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation starts -->

            <div class="navi">
                <div class="container">
                    <div class="navy">
                        <ul>
                            <!-- Main menu -->
                            <li><a href="http://ntshop1.test/">Trang chủ</a>
                            </li>
                            <li><a href="/all">Danh mục sản phẩm</a>
                                <ul>
                                    {!! \App\Helpers\Helper::menus($menus) !!}
                                </ul>
                            </li>

                            <li><a href="/news">Tin tức</a>
                            </li>

                            <li><a href="#">Thông tin</a></li>
                            <li><a href="#">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Navigation ends -->

        </div>

        <!-- Header one ends -->

    </header>
    <!-- end header -->
    @yield('content')



    @include('footer')


</body>


</html>

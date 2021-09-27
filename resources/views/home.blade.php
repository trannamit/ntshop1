@extends('main')

@section('content')

    <!-- start main content -->
    <main class="main-container">

        <!-- new collection directory -->
        <section class="block no-padding">


            <div class="main-slider overlape">
                <div id="full-slider-wrapper">
                    <div id="layerslider" style="width:100%;height:450px;">
                        @foreach ($sliders as $slider)
                            <div class="ls-slide" data-ls="transition3d:all; timeshift:-1000; slidedelay: 7000;">

                                <img src="{{$slider->thumb}}" class="ls-bg"
                                    alt="Slide background" />

                                <div class="ls-slide"
                                    style=" font-family: 'Roboto', sans-serif; font-size:45px; font-weight:900; top:175px; text-transform:uppercase; color:#ffffff; text-shadow: 4px 4px 8px black;"
                                    data-ls="easingin:easeOutBack;  delayin:2000; rotatexin:90; durationin:2000;">{{$slider->name}}
                                    </div>

                                <div class="ls-slide"
                                    style=" font-size:14px; top:230px; color:#ffffff;text-shadow: 2px 2px 4px black;"
                                    data-ls="easingin:easeOutExpo; delayin:2500; rotatexin:90; durationin:2000;">Mua sắm liền tay - Ngập tràn ưu đãi
								</div>

                                <a href="{{ $slider->url }}" title="" class="ls-slide bg-color"
                                    style="padding:11px 13px; color:#ffffff; border-radius:3px; font-family:Lato; font-size:13px; top:270px;"
                                    data-ls="easingin:easeOutBack; delayin:2000; offsetxin:bottom; rotatexin:90; durationin:2000;">Xem thêm
                                    </a>

                            </div>
                            <!-- Slide 1 -->
                        @endforeach

                    </div>
                </div>
            </div><!-- Main Slider -->


        </section>

        <section class="block gray no-padding">
            <!-- prefooter -->
            <div class="lookcare-slider-bottom-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        {{-- load danh muc --}}
                        @foreach ($categorys as $category)
                            <div class="col-md-3 col-xs-6 helix-product clearfix" onclick="location.href='/danh-muc/{{$category->id}}-{{Str::slug($category->name, '-') }}.html';">
                                <div class="img-wrapper" style="height: 220px; width: 220px;position: relative;">
                                    <img style=" height: 100%; object-fit: cover" src="{{ $category->slug }}" alt="" class="img-responsive">
                                </div>
                                <div class="product-detail">
                                    <a href="#">
                                        <h3> {{ $category->name }} </h3>
                                    </a>
                                    <h4>{{ $category->description }}</h4>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- end new collection directory -->





        <!-- Shop Filter
============================================= -->
        <section id="shop" class="shop-4 pt-0">
            <div class="container">
                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-12 shop-filter">
                        <ul class="list-inline">
                            <li>
                                <a href="#">Tất cả sản phẩm</a>
                            </li>
                        </ul>
                    </div>
                    <!-- .projects-filter end -->
                </div>
                <!-- .row end -->
@include('product.list')
            </div>
            <!-- .container end -->
        </section>


        <!-- Start Our Shop Items -->
        <!-- recommend items Ends -->

        <!-- End Our Shop Items -->


        <section class="block parallax-block">
            <div class="layer">
                <div data-velocity="-.3"
                    style="background: url(&quot;/template/br.png&quot;)"
                    class="parallax no-repeat scrolly-invisible"></div><!-- PARALLAX BACKGROUND IMAGE -->
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="lookbook-product">
                                <h2><a href="#" title="">Xu Hướng 2021 </a></h2>
                                <ul class="simple-cat-style">
                                    <li><a href="http://ntshop1.test/danh-muc/1-gpu.html" title="">Cạc đồ hoa</a></li>
                                    <li><a href="http://ntshop1.test/danh-muc/13-ghe-gaming.html" title="">Ghế gaming</a></li>
                                    <li><a href="http://ntshop1.test/danh-muc/14-laptop-gaming.html" title="">Laptop Gaming</a></li>
                                </ul>
                                <a href="http://ntshop1.test/all"  title="">read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection
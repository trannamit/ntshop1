@extends('main')
{{-- {{dd($category)}}
 --}}@section('content')
    <main class="main-container">
        <section class="men_area pt-40">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-9">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="kat-shoe-bg imgframe6">
                                    <img src="/template/pc.png" alt="" />
                                </div>
                            </div>
                        </div>

                        <div class="product-filter">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <H2> {{$category == null ? "Tất Cả Sản Phẩm" : $category->name}} </H2>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2">
                                    <h5 class="control-label">Sort By:</h5>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-4">
                                    <select name="price-type" id="input-sort" class="form-control">
                                        <option value="">Default</option>
                                        <option value="">Name (A - Z)</option>
                                        <option value="">Name (Z - A)</option>
                                        <option value="">Price (Low > High)</option>
                                        <option value="">Price (High > Low)</option>
                                        <option value="">Rating (Lowest)</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div id="shop-all" class="row">
                            @foreach ($products as $product)
                                <!-- Product Item #2 -->
                                <div class="col-xs-12 col-sm-6 col-md-4 product-item filter-sale">
                                    <div class="product-img" style="height: 330px; width: 270px;position: relative;">
                                        <img style=" width: 100%; object-fit: cover" src="{{$product->thumb}}" alt="product">
                                        @if ($product->price_sale != null)
                                            <div class="product-sale">
                                                sale
                                            </div>
                                        @endif
                                        <form class="variations_form cart" action="/add-cart" method="post">
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="hidden" name="num" value="1">
                                            <div class="product-hover"
                                                onclick="location.href='/san-pham/{{ $product->id }}-{{ Str::slug($product->name . '-') }}.html';">
                                                <div class="product-cart">
                                                    <input type="submit" class="btn btn-secondary btn-block"
                                                        value=" Thêm Vào Giỏ">
                                                </div>
                                            </div>
                                            @csrf
                                        </form>
                                    </div>
                                    <!-- .product-img end -->
                                    <div class="product-bio" style="height: 100px;position: relative;">
                                        <h4>
                                            <a href="/san-pham/{{$product->id}}-{{Str::slug($product->name.'-')}}.html">{{$product->name}}</a>
                                        </h4>
                                        <p class="product-price">
                                            @if ($product->price_sale != null)
                                                <span>{{ number_format($product->pric, 0, '', '.') }} đ</span>
                                                {{ number_format($product->price_sale, 0, '', '.') }} đ
                                            @else
                                                {{ number_format($product->price, 0, '', '.') }} đ
                                            @endif
                                        </p>
                                    </div>
                                    <!-- .product-bio end -->

                                </div>
                                <!-- .product-item end -->
                            @endforeach
                        </div>
                        {!! $products->links() !!}

                    </div>

                    <aside class="col-md-3 sidebar">

                        <div class="widget category-widget">

                            <h3>Danh Mục Khác </h3>

                            <ul id="category-widget">
                                {!! \App\Helpers\Helper::menuShop($menus) !!}
                            </ul>
                        </div>
                        <!-- /.category widget -->

                    </aside>
                    <!-- /.col-md-3 -->
                </div>
            </div>
        </section>
        <div class="clearfix"></div>
    </main>
    <script src="/template/js/vendor/jquery-1.10.2.min.js"></script>
    <script src="/template/js/bootstrap.min.js"></script>
    <script src="/template/js/smoothscroll.js"></script>
    <!-- Scroll up js
            ============================================ -->
    <script src="/template/js/jquery.scrollUp.js"></script>
    <script src="/template/js/menu.js"></script>

    <!-- Price filter script -->
    <script src="/template/js/jquery.nouislider.min.js"></script>
    <script src="/template/js/sidebar.js"></script>

    <script src="/template/js/owl.carousel.min.js"></script>
    <script src="/template/js/main.js"></script>
@endsection

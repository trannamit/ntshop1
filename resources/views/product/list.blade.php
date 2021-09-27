                <!-- Projects Item
    ============================================= -->
                <div id="shop-all" class="row">
                    @foreach ($products as $product)
                        <!-- Product Item #2 -->
                        <div class="col-xs-12 col-sm-6 col-md-3 product-item filter-sale" style="height: 400px;">
                            <div class="product-img" style="height: 330px; width: 270px;position: relative;">
                                <img style=" width: 100%; object-fit: cover" src="{{ $product->thumb }}" alt="product">
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
                                    <a
                                        href="/san-pham/{{ $product->id }}-{{ Str::slug($product->name . '-') }}.html">{{ $product->name }}</a>
                                </h4>
                                <p class="product-price">
                                    @if ($product->price_sale != null)
                                        <span>{{ number_format($product->price, 0, '', '.') }} đ</span>
                                        {{ number_format($product->price_sale, 0, '', '.') }} đ
                                    @else
                                        {{ number_format($product->price, 0, '', '.') }} đ
                                    @endif
                                </p>
                            </div>
                            <!-- .product-bio end -->
                            <!-- .product-bio end -->

                        </div>
                        <!-- .product-item end -->
                    @endforeach

                </div>
                <!-- .row end -->

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <a class="btn btn-secondary" href="http://ntshop1.test/all">more products <i
                                class="fa fa-plus ml-xs"></i></a>
                    </div>
                    <!-- .col-md-12 end -->
                </div>
                <!-- .row End -->

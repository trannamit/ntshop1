@extends('main')

@section('content')

    <main class="main-container">
        <section class="product_content_area pt-40">
            <!-- start of page content -->

            <div class="lookcare-product-single container">

                <div class="row">

                    <div class="main col-xs-12" role="main">

                        <div class=" product">

                            <div class="row">

                                <div class="col-md-5 col-sm-6 summary-before ">

                                    <div class="product-slider product-shop">
                                        @if ($product->price_sale != null)
                                            <span class="onsale">Sale!</span>
                                        @endif
                                        <ul class="slides" style="width 470px; height: 470px;">
                                            <a href="{{ $product->thumb }}" data-imagelightbox="gallery"
                                                class="hoodie_7_front">
                                                <img style="width: 100%;" src="{{ $product->thumb }}"
                                                    class="attachment-shop_single" alt="image">
                                            </a>

                                        </ul>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-7 product-review entry-summary">

                                    <h1 class="product_title">{{ $product->name }}</h1>

                                    <div class="woocommerce-product-rating">
                                        <div class="star-rating" title="Rated 4.00 out of 5">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <a href="#reviews" class="woocommerce-review-link">(<span
                                                class="count">3</span> customer reviews)</a>
                                    </div>

                                    <div>
                                        @if ($product->price_sale != null)
                                            <p class="price"><del><span
                                                        class="amount">  {{ number_format($product->price, 0, '', '.')}} đ </span></del>
                                                <ins><span style="color: red" class="amount">
                                                        {{ number_format($product->price_sale, 0, '', '.') }} đ </span></ins>
                                            </p>
                                        @else
                                            <p class="price"><del><span class="amount"></span></del>
                                                <ins><span style="color: red" class="amount">
                                                        {{ number_format($product->price, 0, '', '.') }} đ </span></ins>
                                            </p>
                                        @endif
                                    </div>

                                    <p>{{ $product->description }}</p>


                                    <form class="variations_form cart" action="/add-cart" method="post">
                                        <div class="quantity">
                                            <input type="number" step="1" min="1" name="num" value="1" title="Qty"
                                                class="input-text qty text" size="4" min="1">
                                        </div>
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button type="submit" class="cart-button">Thêm Vào Giỏ</button>
                                        @csrf
                                    </form>

                                </div>
                                <!-- .summary -->

                            </div>

                            <div class="wrapper-description">

                                <ul class="tabs-nav clearfix">
                                    <li class="active">Mô Tả</li>
                                    <li>Đánh Giá</li>
                                </ul>
                                <div class="tabs-container product-comments">

                                    <div class="tab-content">
                                        <section class="related-products">

                                            <h2>Mô Tả Chi Tiết Sản Phẩm</h2>

                                            <span style="font-size: 20px; line-height: 28px;">
                                                {!! $product->content !!}
                                            </span>

                                            <h3 class="section-title">Sản Phẩm Cùng Loại</h3>

                                            <div class="related-products-wrapper">

                                                <div class="related-products-carousel">

                                                    <div class="product-control-nav">
                                                        <a class="prev"><i class="fa fa-angle-left"></i></a>
                                                        <a class="next"><i class="fa fa-angle-right"></i></a>
                                                    </div>

                                                    <div class="products-top"></div>
                                                    <div class="row product-listing">
                                                        <div id="product-carousel" class="product-listing">
                                                            @foreach ($products as $prod)
                                                                @if ($prod->menu_id == $product->menu_id && $prod->id != $product->id)
                                                                    <div class="product">
                                                                        <article>
                                                                            <figure>
                                                                                <a
                                                                                    href="/san-pham/{{ $prod->id }}-{{ Str::slug($prod->name . '-') }}.html">
                                                                                    <img style="height:232px;width:300px; object-fit: cover;"
                                                                                        src="{{ $prod->thumb }}"
                                                                                        class="img-responsive"
                                                                                        alt="T_2_front">
                                                                                </a>
                                                                                <figcaption>
                                                                                    @if ($prod->price_sale == null)
                                                                                        <span
                                                                                            class="amount">{{ number_format($prod->price, 0, '', '.')  }}
                                                                                            đ </span>
                                                                                    @else
                                                                                        <span
                                                                                            class="amount">{{ number_format($prod->price_sale, 0, '', '.') }}
                                                                                            đ </span>
                                                                                    @endif
                                                                                </figcaption>
                                                                            </figure>

                                                                            <form class="variations_form cart"
                                                                                action="/add-cart" method="post">
                                                                                <input type="hidden" name="product_id" value="{{ $prod->id }}">
                                                                                <input type="hidden" name="num" value="1">
                                                                                <div
                                                                                    style="height: 127px;position: relative;">
                                                                                    <h4 class="title"
                                                                                        style="overflow: hidden;"><a
                                                                                            href="#">{{ $prod->name }}</a>
                                                                                    </h4>
                                                                                    <input type="submit" class="button-add-to-cart"
                                                                                        style="position: absolute;bottom: 0px; right: 40px;" value=" Thêm Vào Giỏ">
                                                                                </div>
                                                                                @csrf
                                                                            </form>


                                                                        </article>

                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>

                                        </section>
                                    </div>



                                    <div class="tab-content">

                                        <div class="panel entry-content">

                                            <div id="reviews">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div id="comments">
                                                            <h3>3 reviews for Ship Your Idea</h3>

                                                            <ol class="commentlist">
                                                                <li class="comment depth-1">

                                                                    <div class="comment_container">

                                                                        <img alt="gravatar"
                                                                            src="/template/img/temp-images/com-grav1.jpg"
                                                                            class="avatar photo">
                                                                        <div class="comment-text">




                                                                            <p class="meta">
                                                                                <span class="star-rating"
                                                                                    title="Rated 4.00 out of 5">
                                                                                    <i class="fa fa-star"></i>
                                                                                    <i class="fa fa-star"></i>
                                                                                    <i class="fa fa-star"></i>
                                                                                    <i class="fa fa-star"></i>
                                                                                    <i class="fa fa-star-o"></i>
                                                                                </span>
                                                                                <strong>Stuart</strong> – <time
                                                                                    datetime="2013-06-07T13:03:29+00:00">June
                                                                                    7, 2013</time>:
                                                                            </p>

                                                                            <div class="description">
                                                                                <p>Another great quality product that anyone
                                                                                    who see’s me wearing has asked where to
                                                                                    purchase one of their own.</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <!-- #comment-## -->
                                                                <li class="comment  depth-1">

                                                                    <div class="comment_container">

                                                                        <img src="/template/img/temp-images/com-grav2.jpg"
                                                                            alt="image" class="avatar photo">
                                                                        <div class="comment-text">




                                                                            <p class="meta">
                                                                                <span class="star-rating"
                                                                                    title="Rated 4.00 out of 5">
                                                                                    <i class="fa fa-star"></i>
                                                                                    <i class="fa fa-star"></i>
                                                                                    <i class="fa fa-star"></i>
                                                                                    <i class="fa fa-star"></i>
                                                                                    <i class="fa fa-star-o"></i>
                                                                                </span>
                                                                                <strong>Ryan</strong> – <time
                                                                                    datetime="2013-06-07T13:24:52+00:00">June
                                                                                    7, 2013</time>:
                                                                            </p>


                                                                            <div class="description">
                                                                                <p>This hoodie gets me lots of looks while
                                                                                    out in public, I got the blue one and
                                                                                    it’s awesome. Not sure if people are
                                                                                    looking at my hoodie only, or also at my
                                                                                    rocking bod.</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <!-- #comment-## -->
                                                                <li class="comment depth-1">

                                                                    <div class="comment_container">

                                                                        <img src="/template/img/temp-images/com-grav3.jpg"
                                                                            alt="image" class="avatar photo">
                                                                        <div class="comment-text">

                                                                            <div class="star-rating"
                                                                                title="Rated 3 out of 5">
                                                                            </div>

                                                                            <p class="meta">
                                                                                <span class="star-rating"
                                                                                    title="Rated 4.00 out of 5">
                                                                                    <i class="fa fa-star"></i>
                                                                                    <i class="fa fa-star"></i>
                                                                                    <i class="fa fa-star"></i>
                                                                                    <i class="fa fa-star"></i>
                                                                                    <i class="fa fa-star"></i>
                                                                                </span>
                                                                                <strong>Maria</strong> – <time
                                                                                    datetime="2013-06-07T15:53:31+00:00">June
                                                                                    7, 2013</time>:
                                                                            </p>


                                                                            <div class="description">
                                                                                <p>Ship it!</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <!-- #comment-## -->
                                                            </ol>


                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <div id="review_form_wrapper">
                                                            <div id="review_form">
                                                                <div id="respond" class="comment-respond">
                                                                    <h3 class="comment-reply-title">Add a review </h3>
                                                                    <form action="#" method="post" id="commentform"
                                                                        class="comment-form">
                                                                        <p class="comment-form-author"><label
                                                                                for="author">Name <span
                                                                                    class="required">*</span></label>
                                                                            <input id="author" name="author" type="text">
                                                                        </p>
                                                                        <p class="comment-form-email"><label
                                                                                for="email">Email <span
                                                                                    class="required">*</span></label>
                                                                            <input id="email" name="email" type="text">
                                                                        </p>
                                                                        <p class="comment-form-comment"><label
                                                                                for="comment">Your Review</label><textarea
                                                                                id="comment" name="comment" cols="45"
                                                                                rows="8" aria-required="true"></textarea>
                                                                        </p>
                                                                        <p class="form-submit">
                                                                            <input name="submit" type="submit" id="submit"
                                                                                class="submit" value="Submit">
                                                                        </p>
                                                                    </form>
                                                                </div>
                                                                <!-- #respond -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>





                        </div>
                        <!-- #product-293 -->



                    </div>
                    <!-- end of main -->

                </div>
                <!-- end of .row -->

            </div>

            <!-- end of page content -->
        </section>

        <!-- service area -->

        <div class="clearfix"></div>
        <!-- end service area -->
    </main>



    <script src="/template/js/vendor/jquery-1.10.2.min.js"></script>
    <script src="/template/js/bootstrap.min.js"></script>
    <script src="/template/js/smoothscroll.js"></script>
    <!-- Scroll up js
                    ============================================ -->
    <script src="/template/js/jquery.scrollUp.js"></script>
    <script src="/template/js/menu.js"></script>


    <script src="/template/js/flexslider/jquery.flexslider-min.js"></script>
    <script src="/template/js/image-lightbox/imagelightbox.js"></script>


    <script src="/template/js/owl.carousel.min.js"></script>
    <script src="/template/js/main.js"></script>






    <script type="text/javascript">
        /*-----------------------------------------------------------------------------------*/
        /* Flex Slider
         /*-----------------------------------------------------------------------------------*/
        if (jQuery().flexslider) {

            // Product Page Flex Slider
            $('.product-slider').flexslider({
                animation: "slide",
                animationLoop: false,
                slideshow: false,
                prevText: '<i class="fa fa-angle-left"></i>',
                nextText: '<i class="fa fa-angle-right"></i>',
                animationSpeed: 250,
                controlNav: "thumbnails"
            });

        }


        /*-----------------------------------------------------------------------------------*/
        /* Product Carousel
         /*-----------------------------------------------------------------------------------*/
        if (jQuery().owlCarousel) {
            var productCarousel = $("#product-carousel");
            productCarousel.owlCarousel({
                loop: true,
                dots: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    480: {
                        items: 2
                    },
                    900: {
                        items: 3
                    },
                    1100: {
                        items: 4
                    }
                }
            });

            // Custom Navigation Events
            $(".product-control-nav .next").on("click", function() {
                productCarousel.trigger('next.owl.carousel');
            });

            $(".product-control-nav .prev").on("click", function() {
                productCarousel.trigger('prev.owl.carousel');
            });
        }



        /*-----------------------------------------------------------------------------------*/
        /* Tabs
         /*-----------------------------------------------------------------------------------*/
        $(function() {
            var $tabsNav = $('.tabs-nav'),
                $tabsNavLis = $tabsNav.children('li');

            $tabsNav.each(function() {
                var $this = $(this);
                $this.next().children('.tab-content').stop(true, true).hide()
                    .first().show();
                $this.children('li').first().addClass('active').stop(true, true).show();
            });

            $tabsNavLis.on('click', function(e) {
                var $this = $(this);
                $this.siblings().removeClass('active').end()
                    .addClass('active');
                var idx = $this.parent().children().index($this);
                $this.parent().next().children('.tab-content').stop(true, true).hide().eq(idx).fadeIn();
                e.preventDefault();
            });

        });


        /*-----------------------------------------------------------------------------------*/
        /*	Tabs Widget
         /*-----------------------------------------------------------------------------------*/
        $('.footer .tabbed .tabs li:first-child, .tabbed .tabs li:first-child').addClass('current');
        $('.footer .block:first, .tabbed .block:first').addClass('current');


        $('.tabbed .tabs li').on("click", function() {
            var $this = $(this);
            var tabNumber = $this.index();

            /* remove current class from other tabs and assign to this one */
            $this.siblings('li').removeClass('current');
            $this.addClass('current');

            /* remove current class from current block and assign to related one */
            $this.parent('ul').siblings('.block').removeClass('current');
            $this.closest('.tabbed').children('.block:eq(' + tabNumber + ')').addClass('current');
        });



        /*-----------------------------------------------------------------------------------*/
        /*	Image Lightbox
         /*  http://osvaldas.info/image-lightbox-responsive-touch-friendly
         /*-----------------------------------------------------------------------------------*/
        if (jQuery().imageLightbox) {

            // ACTIVITY INDICATOR

            var activityIndicatorOn = function() {
                    $('<div id="imagelightbox-loading"><div></div></div>').appendTo('body');
                },
                activityIndicatorOff = function() {
                    $('#imagelightbox-loading').remove();
                },


                // OVERLAY

                overlayOn = function() {
                    $('<div id="imagelightbox-overlay"></div>').appendTo('body');
                },
                overlayOff = function() {
                    $('#imagelightbox-overlay').remove();
                },


                // CLOSE BUTTON

                closeButtonOn = function(instance) {
                    $('<button type="button" id="imagelightbox-close" title="Close"></button>').appendTo('body').on(
                        'click touchend',
                        function() {
                            $(this).remove();
                            instance.quitImageLightbox();
                            return false;
                        });
                },
                closeButtonOff = function() {
                    $('#imagelightbox-close').remove();
                },

                // ARROWS

                arrowsOn = function(instance, selector) {
                    var $arrows = $(
                        '<button type="button" class="imagelightbox-arrow imagelightbox-arrow-left"></button><button type="button" class="imagelightbox-arrow imagelightbox-arrow-right"></button>'
                    );

                    $arrows.appendTo('body');

                    $arrows.on('click touchend', function(e) {
                        e.preventDefault();

                        var $this = $(this),
                            $target = $(selector + '[href="' + $('#imagelightbox').attr('src') + '"]'),
                            index = $target.index(selector);

                        if ($this.hasClass('imagelightbox-arrow-left')) {
                            index = index - 1;
                            if (!$(selector).eq(index).length)
                                index = $(selector).length;
                        } else {
                            index = index + 1;
                            if (!$(selector).eq(index).length)
                                index = 0;
                        }

                        instance.switchImageLightbox(index);
                        return false;
                    });
                },
                arrowsOff = function() {
                    $('.imagelightbox-arrow').remove();
                };

            // Lightbox for individual image
            var lightboxInstance = $('a[data-imagelightbox="lightbox"]').imageLightbox({
                onStart: function() {
                    overlayOn();
                    closeButtonOn(lightboxInstance);
                },
                onEnd: function() {
                    closeButtonOff();
                    overlayOff();
                    activityIndicatorOff();
                },
                onLoadStart: function() {
                    activityIndicatorOn();
                },
                onLoadEnd: function() {
                    activityIndicatorOff();
                }
            });

            // Lightbox for product gallery
            var gallerySelector = 'a[data-imagelightbox="gallery"]';
            var galleryInstance = $(gallerySelector).imageLightbox({
                quitOnDocClick: false,
                onStart: function() {
                    overlayOn();
                    closeButtonOn(galleryInstance);
                    arrowsOn(galleryInstance, gallerySelector);
                },
                onEnd: function() {
                    overlayOff();
                    closeButtonOff();
                    arrowsOff();
                    activityIndicatorOff();
                },
                onLoadStart: function() {
                    activityIndicatorOn();
                },
                onLoadEnd: function() {
                    activityIndicatorOff();
                    $('.imagelightbox-arrow').css('display', 'block');
                }
            });

        }
    </script>
@endsection

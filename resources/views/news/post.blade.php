@extends('main')
@section('content')
    <main class="main-container ptb-40">

        <!-- Begin Blog -->
        <div class="ld-subpage-content">
            <div class="ld-blog">



                <!-- Blog / Srart
              ================================================== -->
                <section class="blog">
                    <div class="container">

                        <div class="row">

                            <div class="col-md-12">

                                <!-- Post Start -->
                                <article class="post">

                                    <div class="main-info pull-left">
                                        <!-- Date -->
                                        <div class="date">
                                            <span class="month">{{$post->created_at->toFormattedDateString()}}</span>
                                        </div>
                                    </div>

                                    <div class="post-content">

                                        <!-- Thumbnail -->
                                        <div>
                                            <a href="#"><img style="width: 100%; height: 667px; object-fit: cover"
                                                    src="{{ $post->thumb }}" alt=""></a>
                                        </div>
                                        <!-- Title -->
                                        <h2>{{ $post->title }}</h2>

                                        <!-- Meta -->
                                        <div class="meta clearfix">

                                            <span>
                                                <img src="/template/img/icons/user.png" alt="author">posted by Admin,
                                            </span>
                                            <span>
                                                <img src="/template/img/icons/ribbon.png" alt="author">
                                            </span><span>in <a href="#">NTech Shop</a>.</span>

                                        </div>

                                        <!-- Content -->
                                        <p>
                                            {!! $post->content !!}
                                        </p>

                                    </div>

                                </article>
                                <!-- Post End -->

                            </div>

                        </div>

                    </div>

                </section>
                <!-- Blog / End
            ================================================== -->





            </div>
            <!-- /.life-style-blog -->
        </div>

    </main>
@endsection

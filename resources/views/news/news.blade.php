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

                            <div class="col-md-9">
                                @foreach ($newss as $news)
                                    <!-- Post Start -->
                                    <article class="post">

                                        <div class="main-info pull-left">
                                            <!-- Date -->
                                            <div class="date">
                                                <span class="month">{{$news->created_at->toFormattedDateString()}}</span>
                                            </div>
                                        </div>

                                        <div class="post-content" onclick="location.href='/news/post/{{$news->id}}'">

                                            <!-- Thumbnail -->
                                            <a href="#"><img style="width:784px; height: 393px;" src="{{ $news->thumb }}"
                                                    alt=""></a>

                                            <!-- Title -->
                                            <h2><a href="#">{{ $news->title }}</a></h2>

                                            <!-- Meta -->
                                            <div class="meta clearfix">

                                                <span>
                                                    <img src="/template/img/icons/user.png" alt="author">posted by Admin,
                                                </span>
                                                <span>
                                                    <img src="/template/img/icons/ribbon.png" alt="author">
                                                </span><span>in <a href="#">NTech Shop</a>.</span>

                                            </div>

                                            <!-- Read More -->
                                            <a href="#" class="btn btn-custom-6">Xem thêm</a>

                                        </div>

                                    </article>
                                    <!-- Post End -->
                                @endforeach
                                {!! $newss->links() !!}

                            </div>

                            <!-- Sidebar Start -->
                            <div class="col-md-3">

                            </div>
                            <!-- Sidebar End -->
                        </div>
                        <!-- /.row -->

                    </div>

                </section>
                <!-- Blog / End
                ================================================== -->
            </div>
            <!-- /.life-style-blog -->
        </div>

    </main>

@endsection

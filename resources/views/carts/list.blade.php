@extends('main')

@section('content')
    @include('admin.alert')
    @php
    $total = 0;
    @endphp
    <main class="main-container">
        <form method="post">
            <!-- shopping cart content -->
            <section class="shopping-cart-area">
                <!-- Begin cart -->
                <div class="ld-subpage-content">

                    <div class="ld-cart">

                        <!-- Begin cart section -->
                        <section class="ld-cart-section ptb-50">

                            <div class="container">
                                <form method="post">
                                <div class="row">

                                    
                                        <div class="col-md-12">

                                            <!-- Begin table -->
                                            <table class="table cart-table">
                                                <thead>
                                                    <tr>
                                                        <th class="table-title">Product Name</th>
                                                        <th class="table-title">Product Code</th>
                                                        <th class="table-title">Unit Price</th>
                                                        <th class="table-title">Quantity</th>
                                                        <th class="table-title">SubTotal</th>
                                                        <th>

                                                            <span class="close-button disabled"></span>
                                                        </th>
                                                    </tr>
                                                </thead>


                                                <tbody>
                                                    @if (count($products) == 0)
                                                        <div class="text-center"><h1> Giỏ Hàng Trống </h1></div>
                                                    @else

                                                        @foreach ($products as $product)
                                                            @php
                                                                $price = $product->price_sale == null ? $product->price : $product->price_sale;
                                                                $priceEnd = $price * $carts[$product->id];
                                                                $total += $priceEnd;
                                                            @endphp
                                                            <tr>
                                                                <td class="product-name-col">
                                                                    <figure>
                                                                        <div
                                                                            style="height: 168px; width: 168px ;position: relative">
                                                                            <a href="#"><img
                                                                                    style=" width: 100% ; object-fit: cover"
                                                                                    class="img-responsive"
                                                                                    src="{{ $product->thumb }}"
                                                                                    alt="White linen sheer dress"></a>
                                                                        </div>
                                                                    </figure>
                                                                    <h2 class="product-name"><a
                                                                            href="#">{{ $product->name }}</a>
                                                                    </h2>
                                                                </td>
                                                                <td class="product-code">{{ $product->id }}</td>
                                                                <td class="product-price-col">
                                                                    <span
                                                                        class="product-price-special">{{ number_format($price, 0, '', '.') }}đ</span>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-quantity-input">
                                                                        <input type="number"
                                                                            name="num_product[{{ $product->id }}]"
                                                                            value="{{ $carts[$product->id] }}">
                                                                    </div>
                                                                </td>
                                                                <td class="product-total-col">
                                                                    <span
                                                                        class="product-price-special">{{ number_format($priceEnd, 0, '', '.') }}đ</span>
                                                                </td>
                                                                <td>
                                                                    <a href="/carts/delete/{{ $product->id }}"
                                                                        class="close-button"><i
                                                                            class="fa fa-times"></i></a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        <!-- End tr -->
                                                    @endif
                                                </tbody>
                                            </table>
                                            <!-- End table -->

                                            <div class="text-right">
                                                <input style="background-color: gray; width:300px;;" type="submit"
                                                    value="Update" formaction="/update-cart"
                                                    class="btn btn-custom-6 btn-lger min-width-sm">
                                            </div>
                                            @csrf
                                    <div class="mt-30"></div>

                                    <div class="row">
                                        {{-- //----------------------------------------------------------------------------- --}}>
                                            <div class="col-md-7 padding-right-md">
                                                <h3 class="subtitle">Thông Tin Khách Hàng </h3>

                                                <div class="xs-margin half">
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label">Họ tên

                                                        <span class="required">*
                                                        </span>
                                                    </label>
                                                    <input type="text" name="name"
                                                        class="form-control input-lg" required="">
                                                </div>

                                                <div class="form-group">
                                                    <label for="telephone" class="form-label">Số điện thoại

                                                        <span class="required">*
                                                        </span>
                                                    </label>
                                                    <input type="text" name="phone" id="telephone"
                                                        class="form-control input-lg" required="">
                                                </div>

                                                <div class="form-group">
                                                    <label for="email2" class="form-label"> Email

                                                        <span class="required">*
                                                        </span>
                                                    </label>
                                                    <input type="email" name="email" id="email2" class="form-control input-lg"
                                                        required="">
                                                </div>

                                                

                                                <div class="form-group">
                                                    <label  class="form-label">Đia Chỉ

                                                        <span class="required">*
                                                        </span>
                                                    </label>
                                                    <input type="text" name="add" class="form-control input-lg"
                                                        required="">
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label">Ghi chú

                                                        <span class="required">*
                                                        </span>
                                                    </label>
                                                    <input type="text" name="note" class="form-control input-lg"
                                                        required="">
                                                </div>

                                                <div class="top-10px">
                                                </div>

                                                <div class="form-group custom-checkbox-wrapper">

                                                    
                                                    </span>
                                                </div>
                                                <div class="text-center"><button type="submit" style="background-color: gray"
                                                        class="col-md-6 btn btn-custom-6 btn-lger min-width-sm">Đặt
                                                        hàng</button>
                                                </div>
                                                @csrf
                                            </div>

                                        {{-- //----------------------------------------------------------------------------- --}}

                                        <div class="col-md-5">

                                            <div class="mt-30"></div>
                                        </div>

                                        <div class="mt-30 visible-sm visible-xs clearfix"></div>

                                        <div class="col-md-4">

                                            <table class="table total-table">

                                                <tbody>
                                                    <tr>
                                                        <td class="total-table-title">Tổng đơn hàng:</td>
                                                        <td>{{ number_format($total, 0, '', '.') }} đ</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="total-table-title">Phí vận chuyển:</td>
                                                        <td>$0.00</td>
                                                    </tr>
                                                </tbody>

                                                <tfoot>
                                                    <tr>
                                                        <td>Tổng Cộng:</td>
                                                        <td>{{ number_format($total, 0, '', '.') }}đ</td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                            <!-- End table -->
                                            <div class="mt-30"></div>
                                            <div class="row">
                                            </div>
                                        </div>
                                        <!-- /.col-md-4 -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                            </form>
                            </div>
                    </div>

            </section>
            <!-- /.ld-cart-section -->

            </div>
            <!-- /.ld-cart -->
            </div>
            <!-- /.ld-subpage-content -->
            <!-- End Cart -->
            </section>
            <!-- end shopping cart content -->

    </main>
@endsection

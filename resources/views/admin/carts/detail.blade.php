@extends('admin.main')

@section('content')
    <div class="form-group mt-3">
        <ul>
            <li>Đơn hàng số <strong> {{ $customer->id }}</strong> </li>
            <li>Tên khách hàng <strong> {{ $customer->name }}</strong> </li>
            <li>SDT <strong> {{ $customer->phone }}</strong> </li>
            <li>Email<strong> {{ $customer->email }}</strong></li>
            </li>
            <li>Ngày Đặt <strong> {{ $customer->created_at }}</strong> </li>
        </ul>
    </div>
    <table class="table">
        @php
            $priceEnd = 0;
            $total = 0;
        @endphp
        <thead>
            <tr>
                <th>ID SP</th>
                <th>Tên sản phẩm</th>
                <th>Ảnh</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Thành Tiền</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($carts as $key => $cart)
                @php
                    
                    $priceEnd = $cart->price * $cart->qty;
                    $total += $priceEnd;
                @endphp
                <tr>
                    <td>{{ $cart->id }}</td>
                    <td>{{ $cart->product->name }}</td>
                    <td>
                    <img src="{{$cart->product->thumb}}" style="height:30px">
                    </td>
                    <td>{{ number_format($cart->price,0,'','.') }}</td>
                    <td>{{ $cart->qty }}</td>
                    <td>{{ number_format($priceEnd,0,'','.') }}</td>
                </tr>
            @endforeach
            <tr>
                <td> Tổng Cộng: </td>
                <td> <strong> {{ number_format($total,0,'','.')}}</strong></td>
            </tr>
        </tbody>
    </table>
    
    {{-- 
    {!! $carts->links() !!} --}}
@endsection

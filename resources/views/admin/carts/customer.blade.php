@extends('admin.main')

@section('content')
@include('admin.alert')
@php 
$total = 0;
$priceEnd = 0;
@endphp
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên khách hàng</th>
                <th>SDT</th>
                <th>Email</th>
                <th>Ngày Đặt</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $key => $customer)
            <tr onclick="location.href='/admin/customer/view/{{$customer->id}} '">
                <td>{{$customer->id }}</td>
                <td>{{$customer->name }}</td>
                <td>{{$customer->phone}}</td>
                <td>{{$customer->email }}</td>
                <td>{{$customer->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $customers->links() !!}
@endsection
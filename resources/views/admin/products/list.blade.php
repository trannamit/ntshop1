@extends('admin.main')

@section('content')
@include('admin.alert')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên SP</th>
                <th>Danh mục</th>
                <th>Mô Tả</th>
                <th>Giá gốc</th>
                <th>Giá KM</th>
                <th>Active</th>
                <th>Update</th>
                <th>Image</th>
                <th style="width:100px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $key => $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{$product->name }}</td>
                <td>{{$product->menu->name }}</td>
                <td>{{$product->description }}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->price_sale}}</td>
                <td>{!!\App\Helpers\Helper::active($product->active) !!}</td>
                <td>{{$product->updated_at}}</td>
                <td>
                    <img src="{{$product->thumb}}" style="height:30px">
                </td>
                <td>
                <a href="/admin/products/edit/{{$product->id}} . '" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                <a href="#" class="btn btn-danger btn-sm" onclick="removeRow({{$product->id}} ,'/admin/products/destroy')" >
                    <i class="fa fa-fas fa-trash"></i>
                </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $products->links() !!}
@endsection

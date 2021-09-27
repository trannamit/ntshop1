@extends('admin.main')

@section('content')
@include('admin.alert')
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tiêu Đề</th>
            <th>Trạng Thái</th>
            <th>Đã Tạo</th>
            <th>Cập Nhật</th>
            <th>Image</th>
            <th style="width:100px">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @foreach($newss as $key => $news)
        <tr>
            <td>{{$news->id }}</td>
            <td style="width: 40%; height:overflow: hidden;">{{$news->title }}</td>
            <td>{!!\App\Helpers\Helper::active($news->active) !!}</td>
            <td>{{$news->created_at}}</td>
            <td>{{$news->updated_at}}</td>
            <td>
                <img src="{{$news->thumb}}" style="height:30px">
            </td>
            <td>
            <a href="/admin/news/edit/{{$news->id}} . '" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
            <a href="#" class="btn btn-danger btn-sm" onclick="removeRow({{$news->id}} ,'/admin/news/destroy')" >
                <i class="fa fa-fas fa-trash"></i>
            </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $newss->links() !!}
@endsection
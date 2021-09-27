@extends('admin.main')

@section('content')
    @include('admin.alert')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tiêu đề</th>
                <th>Đường dẫn</th>
                <th>Kích hoạt</th>
                <th>Cập nhật</th>
                <th>Ảnh</th>
                <th style="width:100px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sliders as $key => $slider)
                <tr>
                    <td>{{ $slider->id }}</td>
                    <td>{{ $slider->name }}</td>
                    <td>{{ $slider->url }}</td>
                    <td>{!! \App\Helpers\Helper::active($slider->active) !!}</td>
                    <td>{{ $slider->updated_at }}</td>
                    <td>
                        <img src="{{ $slider->thumb }}" style="height:30px">
                    </td>
                    <td>
                        <a href="/admin/sliders/edit/{{ $slider->id }} . '" class="btn btn-primary btn-sm"><i
                                class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-danger btn-sm"
                            onclick="removeRow({{ $slider->id }} ,'/admin/sliders/destroy')">
                            <i class="fa fa-fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $sliders->links() !!}
@endsection

@extends('admin.main')
@section('head')
    <!-- Make sure the path to CKEditor is correct. -->
    <script src="/template/ckeditor/ckeditor.js"></script>
@endsection
@section('content');
@include('admin.alert')
<form action="" method="post">
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Tiêu đề</label>
            <input name="title" type="text" value="{{ $news->title }}" class="form-control" placeholder="Tiêu đề bảng tin">
        </div>
        <div class="form-group">
            <label>Nội dung tin</label>
            <textarea name="content" class="form-control" id="content">{{ $news->content }}</textarea>
        </div>
        <div class="form-group">
            <label>Tag</label>
            <input name="tag" value="{{ $news->tag }}" type="textarea" class="form-control">
        </div>
        <div class="form-group">
            <div class="custom-control custom-radio">
                <input type="radio" name="active" class="custom-control-input" value=1 id="active" {{$news->active == 1 ? 'checked' :''}}>
                <label class="custom-control-label" for="active">Kích hoạt</label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" name="active" class="custom-control-input" value=0 id="no_active" {{$news->active == 0 ? 'checked' :''}}>
                <label class="custom-control-label" for="no_active">không kích hoạt</label>
            </div>
        </div>
        <div class="form-group">
            <label for="menu">Ảnh</label>
            <input type="file" class="form-control" id="upload">
            <div id="image_show">
                <a href="{{$news->thumb}}" target="_blank">
                <img src="{{$news->thumb}}" width="100px">
                </a>
            </div>
            <input type="hidden" name="thumb" value="{{$news->thumb}}" id="thumb">
        </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </div>
    @csrf
</form>
@endsection
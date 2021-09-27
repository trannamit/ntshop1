@extends('admin.main')
@section('head')
    <!-- Make sure the path to CKEditor is correct. -->
    <script src="/template/ckeditor/ckeditor.js"></script>
@endsection

@section('content') {{-- // thêm mội dung "add danh mục" --}}
@include('admin.alert')
    <form action="" method="post">
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Tên danh mục</label>
                <input name="name" type="text" value="{{$menu->name}}" class="form-control" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label>Danh mục</label>
                <select name="parent_id" class="form-control">
                    <option value="0" {{ $menu->parent_id == 0 ? 'selected' : '' }}> danh mục cha</option>
                    @foreach($menus as $menuParent)
                    <option value="{{$menuParent->id}}"{{ $menu->parent_id == $menuParent->id ? 'selected' : '' }}>{{$menuParent->name}}</option>
                    @endforeach

                </select>
            </div>
            <div class="form-group">
                <label>Mô tả</label>
                <input name="description" value="{{$menu->description}}" type="textarea" class="form-control">
            </div>
            <div class="form-group">
                <label>Chi tiết danh mục</label>
                <textarea name="content" class="form-control" id="content">{{$menu->content}}</textarea>
            </div>

            <div class="form-group">
                <div class="custom-control custom-radio">
                    <input type="radio" name="active" class="custom-control-input" value=1 id="active" {{$menu->active == 1 ? 'checked' :''}}>
                    <label class="custom-control-label" for="active">Kích hoạt</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" name="active" class="custom-control-input" value=0 id="no_active" {{$menu->active == 0 ? 'checked' :''}} >
                    <label class="custom-control-label" for="no_active">không kích hoạt</label>
                </div>
            </div>
            <div class="form-group">
                <label for="menu">Ảnh sản phẩm</label>
                <input type="file" class="form-control"  id="upload">
                <div id="image_show">
                    <a href="{{$menu->slug}}" target="_blank">
                    <img src="{{$menu->slug}}" width="100px">
                    </a>
                </div>
                <input type="hidden" name="slug" value="{{$menu->slug}}" id="thumb">
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật danh mục</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection

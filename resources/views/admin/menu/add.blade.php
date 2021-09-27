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
                <input name="name" type="text" class="form-control" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label>Danh mục</label>
                <select name="parent_id" class="form-control">
                    <option value="0"> danh mục cha</option>
                    @foreach($menus as $menu) {{-- duyệt mảng menus lấy các phần tử menu --}}
                    <option value="{{$menu->id}}">{{$menu->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Mô tả</label>
                <input name="description" type="textarea" class="form-control">
            </div>
            <div class="form-group">
                <label>Chi tiết danh mục</label>
                <textarea name="content" class="form-control" id="content"></textarea>
            </div>

            <div class="form-group">
                <div class="custom-control custom-radio">
                    <input type="radio" name="active" class="custom-control-input" value=1 id="active" checked="">
                    <label class="custom-control-label" for="active">Kích hoạt</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" name="active" class="custom-control-input" value=0 id="no_active">
                    <label class="custom-control-label" for="no_active">không kích hoạt</label>
                </div>
            </div>
            <div class="form-group">
                <label for="menu">Ảnh sản danh mục</label>
                <input type="file" class="form-control" id="upload">
                <div id="slug" >
                </div>
                <input type="hidden" name="slug" id="thumb">
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tạo danh mục</button>
        </div>
        @csrf
    </form>
@endsection


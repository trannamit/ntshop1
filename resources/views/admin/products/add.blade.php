@extends('admin.main')
@section('head')
    <!-- Make sure the path to CKEditor is correct. -->
    <script src="/template/ckeditor/ckeditor.js"></script>
@endsection

@section('content') {{-- // thêm mội dung "add danh mục" --}}
    <form action="" method="post">
        @include('admin.alert')
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên sản phẩm</label>
                        <input type="text" name="name" value="{{ old('name')}}" class="form-control" placeholder="Enter Name">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Danh mục</label>
                        <select name="menu_id" class="form-control">
                            @foreach ($menus as $menu) {{-- duyệt mảng menus lấy các phần tử menu --}}
                                <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Giá gốc</label>
                        <input type="number" name="price" value="{{ old('price')}}" class="form-control" placeholder="VND">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Giá khuyến mãi</label>
                        <input type="number" name="price_sale" value="{{ old('price_sale')}}" class="form-control" placeholder="VND">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Mô tả</label>
                <input name="description" value="{{ old('description')}}" type="textarea" class="form-control">
            </div>
            <div class="form-group">
                <label>Chi tiết danh mục</label>
                <textarea name="content" class="form-control" value="{{ old('content')}}" id="content"></textarea>
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
                <label for="menu">Ảnh sản phẩm</label>
                <input type="file" class="form-control" id="upload">
                <div id="image_show" >
                </div>
                <input type="hidden" name="thumb" id="thumb">
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tạo sản phẩm</button>
        </div>
        @csrf
    </form>
@endsection

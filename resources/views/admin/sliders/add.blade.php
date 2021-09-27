@extends('admin.main')
@section('head')

@endsection

@section('content') {{-- // thêm mội dung "add danh mục" --}}
    <form action="" method="post">
        @include('admin.alert')
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên slide</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                            placeholder="Enter Name">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Dường đẫn</label>
                        <input type="text" name="url" value="{{ old('url') }}" class="form-control"
                            placeholder="Enter url">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="menu">Ảnh sản phẩm</label>
                        <input type="file" class="form-control" id="upload">
                        <div id="image_show">
                        </div>
                        <input type="hidden" name="thumb" id="thumb">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Sắp xếp </label>
                        <input type="number" name="sort_by" value="{{ old('sort_by') }}" class="form-control">
                    </div>
                </div>
            </div>
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

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tạo Slider</button>
        </div>
        @csrf
    </form>
@endsection

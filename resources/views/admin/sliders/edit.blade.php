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
                        <input type="text" name="name" value="{{ $slider->name }}" class="form-control"
                            placeholder="Enter Name">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Dường đẫn</label>
                        <input type="text" name="url" value="{{ $slider->url }}" class="form-control"
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
                            <a href="{{$slider->thumb}}" target="_blank">
                            <img src="{{$slider->thumb}}" width="100px">
                            </a>
                        </div>
                        <input type="hidden" name="thumb" value="{{$slider->thumb}}" id="thumb">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Sắp xếp </label>
                        <input type="number" name="sort_by" value="{{ $slider->sort_by }}" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="custom-control custom-radio">
                <input type="radio" name="active" class="custom-control-input" value=1 id="active" {{$slider->active == 1 ? 'checked' :''}}>
                <label class="custom-control-label" for="active">Kích hoạt</label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" name="active" class="custom-control-input" value=0 id="no_active {{$slider->active == 0 ? 'checked' :''}}">
                <label class="custom-control-label" for="no_active">không kích hoạt</label>
            </div>
        </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật Slider</button>
        </div>
        @csrf
    </form>
@endsection

@extends('admin.main')

@section('head')
    <!-- <script src="/ckeditor/ckeditor.js"></script> -->
@endsection

@section('content')

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group">
                <label>Địa danh</label>
                <select class="form-control" name="place_id">
                    @foreach($places as $place)
                        <option value="{{$place->id}}" selected>{{$place->place_name}}</option>
                        <option value="{{$place->id}}">{{$place->place_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Tên Khách Sạn</label>
                <input type="text" name="hotel_name" class="form-control" placeholder="Nhập tên danh mục" value="{{ $hotel->hotel_name }}">
            </div>
            <div class="form-group">
                <label>Ảnh</label>
                <input type="file" name="image" class="form-control" placeholder="Choose image" id="image">
                <img src="{{ $hotel->image }}" style="max-height: 200px; max-width: 200px" alt="" class="mt-2">
            </div>
            <div class="form-group">
                <label>Địa chỉ</label>
                <input type="text" name="location" class="form-control" placeholder="Nhập Địa chỉ" value="{{ $hotel->location }}">
            </div>
            <div class="form-group">
                <label>Kinh độ</label>
                <input type="text" name="kinhDo" class="form-control" placeholder="Nhập Kinh độ" value="{{ $hotel->kinhDo }}">
            </div>
            <div class="form-group">
                <label>Vĩ độ</label>
                <input type="text" name="viDo" class="form-control" placeholder="Nhập Vĩ độ" value="{{ $hotel->viDo }}">
            </div>
            <!-- <div class="form-group">
                <label>Kích Hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked="">
                    <label for="active" class="custom-control-label">Yes</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="no_active" name="active">
                    <label for="no_active" class="custom-control-label">No</label>
                </div>
            </div> -->
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập Nhật Khách Sạn</button>
        </div>
        @csrf
    </form>

@endsection

@section('footer')
    <!-- <script>
        CKEDITOR.replace('content');
    </script> -->
@endsection
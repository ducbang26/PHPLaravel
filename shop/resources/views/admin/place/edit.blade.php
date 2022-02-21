@extends('admin.main')

@section('head')
    <!-- <script src="/ckeditor/ckeditor.js"></script> -->
@endsection

@section('content')

<form action="" method="POST" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group">
                <label>Tên địa danh</label>
                <input type="text" name="place_name" class="form-control" placeholder="Nhập tên địa danh" value="{{$place->place_name}}">
            </div>
            <div class="form-group">
                <label>Số sao</label>
                <input type="number" name="star" class="form-control" placeholder="Nhập Số sao" value="{{$place->star}}">
            </div>
            <div class="form-group">
                <label>Ảnh</label>
                @foreach($images as $image)
                    <img src="{{ $image->image }}" style="height: 150px; width: 200px" alt="" class="mt-2"/>
                @endforeach
                <input type="file" name="image" class="form-control" placeholder="Choose image" id="image">
                @error('image')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Địa chỉ</label>
                <input type="text" name="location" class="form-control" placeholder="Nhập Địa chỉ" value="{{$place->location}}" >
            </div>
            <div class="form-group">
                <label>Nhiệt độ</label>
                <input type="text" name="temperature" class="form-control" placeholder="Nhập Nhiệt độ" value="{{$place->temperature}}">
            </div>
            <div class="form-group">
                <label>Kinh độ</label>
                <input type="text" name="kinhDo" class="form-control" placeholder="Nhập Kinh độ" value="{{$place->kinhDo}}">
            </div>
            <div class="form-group">
                <label>Vĩ độ</label>
                <input type="text" name="viDo" class="form-control" placeholder="Nhập Vĩ độ" value="{{$place->viDo}}">
            </div>
            <div class="form-group">
                <label>Mô tả</label>
                <input type="text" name="description" class="form-control" placeholder="Nhập Mô tả" value="{{$place->description}}">
            </div>
            <div class="form-group">
                <label>Vùng miền</label>
                <input type="text" name="region" class="form-control" placeholder="Nhập Vùng miền" value="{{$place->region}}">
            </div>
            <div class="form-group">
                <label>Phổ Biến</label>
                @if ($place->popular==1)
                
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="1" type="radio" id="popular" name="popular" checked="">
                        <label for="popular" class="custom-control-label">Yes</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="1" type="radio" id="no_popular" name="popular">
                        <label for="no_popular" class="custom-control-label">No</label>
                    </div>
                
                @else
                
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="1" type="radio" id="popular" name="popular" >
                        <label for="popular" class="custom-control-label">Yes</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="1" type="radio" id="no_popular" name="popular" checked="">
                        <label for="no_popular" class="custom-control-label">No</label>
                    </div>
                
                @endif
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập Nhật địa danh</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <!-- <script>
        CKEDITOR.replace('content');
    </script> -->
@endsection
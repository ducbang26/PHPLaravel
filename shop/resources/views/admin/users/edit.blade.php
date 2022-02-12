@extends('admin.main')

@section('head')
@endsection

@section('content')

    <form action="" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label>Tên</label>
                <input type="text" class="form-control" readonly value="{{ $users->name }}">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text"  class="form-control" readonly value="{{ $users->email }}">
            </div>
            <div class="form-group">
                <label>Trạng Thái</label><br/>
                <input type="checkbox" name="status" checked="{{ $users->status}}">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Vô Hiệu Hóa Tài Khoản</button>
           
        @csrf
    </form>

@endsection

@section('footer')
@endsection

@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width:50px">ID</th>
                <th>Nội Dung</th>
                <th>Nổi Bật</th>
                <th>Trạng Thái</th>
                <th>Chỉnh Sửa</th>
                <th style="width:100px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            {!! \App\Helpers\Helper::post($posts) !!}
        </tbody>
    </table>
@endsection

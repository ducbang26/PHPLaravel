@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width:50px">ID</th>
                <th>Tên</th>
                <th>Mô Tả</th>
                <th style="width:95px">Nổi Bật</th>
                <th style="width:100px">Chỉnh Sửa</th>
                <th>Xóa</th>
                <th style="width:100px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            {!! \App\Helpers\Helper::place($places) !!}
        </tbody>
    </table>
@endsection

@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width:50px">ID</th>
                <th>Tên</th>
                <th>Hình ảnh</th>
                <th>Email</th>
                <th>Admin</th>
                <th>Trạng Thái</th>
                <th style="width:100px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            {!! \App\Helpers\Helper::User($users) !!}
        </tbody>
    </table>
@endsection

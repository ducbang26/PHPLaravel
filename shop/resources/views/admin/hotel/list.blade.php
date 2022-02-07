@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width:50px">ID</th>
                <th>KHÁCH SẠN</th>
                <th>HÌNH ẢNH</th>
                <th style="width:100px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            {!! \App\Helpers\Helper::Hotel($hotels) !!}
        </tbody>
    </table>
@endsection
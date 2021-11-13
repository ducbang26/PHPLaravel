@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width:50px">ID</th>
                <th>NAME</th>
                <th>ACTIVE</th>
                <th>UPDATE</th>
                <th style="width:100px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            {!! \App\Helpers\Helper::Menu($menus) !!}
        </tbody>
    </table>
@endsection
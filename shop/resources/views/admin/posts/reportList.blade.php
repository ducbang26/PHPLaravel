@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width:50px">ID</th>
                <th>Nội Dung</th>
                <th>Id Bài Viết</th>
                <th style="width:100px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            {!! \App\Helpers\Helper::report($reports) !!}
        </tbody>
    </table>
@endsection

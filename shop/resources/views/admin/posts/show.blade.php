@extends('admin.main')

@section('head')

@endsection

@section('content')
    <form action="list" method="POST" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group">
                <label>Địa danh</label>
                    @foreach($places as $place)
                    @if($place->id==$posts->place_id)
                        <input class="form-control" value="{{$place->place_name}}"readonly ></input>
                    @endif
                    @endforeach
            </div>
            <div class="form-group">
                <label>Người Dùng</label>
                    @foreach($users as $user)
                    @if($user->id==$posts->user_id)
                        <input class="form-control" value="{{$user->name}}" readonly ></input>
                    @endif
                    @endforeach
            </div>
            <div class="form-group">
                <label>Ảnh</label><br/>
                @foreach($postimages as $postimage)
                    <img src="{{ $postimage->image }}" style="height: 150px; width: 200px" alt="" class="mt-2"/>
                @endforeach
            </div>
            <div class="form-group">
                <label>Nội Dung</label>
                    <input class="form-control" value="{{$posts->content}}" readonly ></input>
            </div>
            </div>
        </div>
        <div class="card-footer">
            <a type="submit" href="../list" class="btn btn-primary">Quay Lại</a>
        </div>
        @csrf
    </form>
@endsection
@section('footer')
@endsection

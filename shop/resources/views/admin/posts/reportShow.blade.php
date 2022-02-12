@extends('admin.main')

@section('head')

@endsection

@section('content')
<form action="list" method="POST" enctype="multipart/form-data">
    <div class="card-body">
        <div class="form-group">
            <label>Nội Dung Tố Cáo</label>
            <input class="form-control" value="{{$reports->content}}" readonly></input>
        </div>
        <div class="form-group">
            <label>Địa danh</label>
            @foreach($posts as $post)
                @if($post->id==$reports->post_id)
                    @foreach($places as $place)
                        @if($place->id==$post->place_id)
                            <input class="form-control" value="{{$place->place_name}}" readonly></input>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>
        <div class="form-group">
            <label>Địa danh</label>
            @foreach($posts as $post)
                @if($post->id==$reports->post_id)
                <input class="form-control" value="{{$post->content}}" readonly></input>
                @endif
            @endforeach
        </div>
    </div>

    <div class="card-footer row">
        <a type="submit" href="../list" class="btn btn-primary">Quay Lại</a>&nbsp;
        @foreach($posts as $post)
                @if($post->id==$reports->post_id)
                   @if($post->status == 1)
                    <a type="submit" href="{{ url('/admin/posts/unactive' , [ 'id' => $post->id ]) }}" class="btn btn-danger">Chặn</a>
                   @else
                    <a type="submit" href="{{ url('/admin/posts/active' , [ 'id' => $post->id ]) }}" class="btn btn-success">Bỏ Chặn</a>
                   @endif
                @endif
        @endforeach
    </div>
    @csrf
</form>
@endsection
@section('footer')
@endsection

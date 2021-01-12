
    @if(Auth::user()->is_favorites($micropost->id))
        {{--お気に入り解除のボタンフォーム --}}
        {!! Form::open(['route' => ['micropost.unfavorite', $micropost->id],'method' => 'delete']) !!}
            {!! Form::submit('お気に入り解除', ['class' => "btn btn-danger btn-sm"]) !!}
        {!! Form::close() !!}
    @else
        {{--お気に入り登録のボタンフォーム --}}
        {!! Form::open(['route' => ['micropost.favorite', $micropost->id]]) !!}
            {!! Form::submit('お気に入り登録', ['class' => "btn btn-primary btn-sm"]) !!}
        {!! Form::close() !!}
    @endif

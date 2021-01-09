@if(Auth::id() != $user->id)
    @if(Auth::user()->is_following($user->id))
        {{--アンフォローのボタンフォーム --}}
        {!! Form::open(['route' => ['user.unfollow', $user->id],'method' => 'delete']) !!}
            {!! Form::submit('Unfollow', ['class' => "btn btn-danger btn-block"]) !!}
        {!! Form::close() !!}
    @else
        {{--フォローのボタンフォーム --}}
        {!! Form::open(['route' => ['user.follow', $user->id]]) !!}
            {!! Form::submit('follow', ['class' => "btn btn-primary btn-block"]) !!}
        {!! Form::close() !!}
    @endif
@endif
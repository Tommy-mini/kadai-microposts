@extends('layouts.app')

@section('content')
    <div class="center jumbtoron">
        <div class="text-center">
            <h1>Welcome to the Microposts</h1>
            {{-- ユーザ登録ページへのリンク --}}
            {!! link_to_route('siginup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary'}) !!}
        </div>
    </div>
@endsection
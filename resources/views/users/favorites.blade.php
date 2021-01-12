@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            {{--ユーザ情報--}}
            @include('users.card')
        </aside>
        <div class="col-sm-4">
            {{--タブ--}}
            @include('users.navtabs')
            {{--お気に入り一覧--}}
            @include('microposts.favorite_micropost')
        </div>
    </div>
@endsection
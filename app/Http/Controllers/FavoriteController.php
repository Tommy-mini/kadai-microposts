<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    /**
     * 投稿をお気に入り登録するアクション
     * 
     * @param $micropostId 対象の投稿id
     * @return \Illuminate\Http\Response
     */
    public function store($micropostId)
    {
        //認証済みユーザ（閲覧者）が、idの投稿をお気に入り登録する
        \Auth::user()->favorite($micropostId);
        //前のURLへリダイレクトさせる
        return back();
    }

     /**
     * 投稿のお気に入り登録を解除するアクション
     * 
     * @param $micropostId 対象の投稿id
     * @return \Illuminate\Http\Response
     */
    public function destroy($micropostId)
    {
        //認証済みユーザ（閲覧者）が、idの登録のお気に入り登録を解除する
        \Auth::user()->unfavorite($micropostId);
        //前のURLへリダイレクトさせる
        return back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
    public function index()
    {
        //ユーザ一覧をidの降順で取得
        $users = User::orderBy('id', 'desc')->paginate(10);
        
        //ユーザ一覧ビューでそれを表示
        return view('users.index', [
            'users' => $users,
        ]);
    }

    public function show($id)
    {
        //　idの値でユーザを検索して表示
        $user = User::findOrFail($id);
        
        //関係するモデルの件数をロード
        $user->loadRelationshipCounts();
        
        //ユーザの投稿一覧を作成日時の降順で取得
        $microposts = $user->microposts()->orderBy('created_at', 'desc')->paginate(10);
        
        //ユーザ詳細ビューでそれを表示
        return view ('users.show', [
            'user' => $user,
            'microposts' => $microposts,
        ]);
    }
        
    /**
     * ユーザのフォロー一覧ページを表示するアクション
     * 
     * @param $id ユーザのid
     * @return \illuminate\Http\Resposne
     */
    public function followings($id)
    {
        //IDの値でユーザを検索して取得
        $user = User::findOrFail($id);
        
        //関係するモデルの件数をロード
        $user->loadRelationshipCounts();
        
        //ユーザのフォロー一覧を取得
        $followings = $user->followings()->paginate(10);
        
        //フォロー一覧ビューでそれらを表示
        return view('users.followings', [
            'user' => $user,
            'users' => $followings,
        ]);
    }
   
    /**
     * ユーザのフォロワー一覧ページを表示するアクション
     * 
     * @param $id ユーザのid
     * @return \illuminate\Http\Resposne
     */
    public function followers($id)
    {
        //IDの値でユーザを検索して取得
        $user = User::findOrFail($id);
        
        //関係するモデルの件数をロード
        $user->loadRelationshipCounts();
        
        //ユーザのフォロー一覧を取得
        $followers = $user->followers()->paginate(10);
        
        //フォロー一覧ビューでそれらを表示
        return view('users.followers', [
            'user' => $user,
            'users' => $followers,
        ]);
    }
    
    /**
     * ユーザのお気に入り一覧ページを表示するアクション
     * 
     * @param $id ユーザのid
     * @return \illuminate\Http\Resposne
     */
    public function favorites($id)
    {
        //IDの値でユーザを検索して取得
        $user = User::findOrFail($id);
        
        //関係するモデルの件数をロード
        $user->loadRelationshipCounts();
        
        //ユーザのお気に入り一覧を取得
        $microposts = $user->favorites()->paginate(10);
        
        //お気に入り一覧ビューでそれらを表示
        return view('users.favorites', [
            'user' => $user,
            'microposts' => $microposts,
        ]);
    }    
}

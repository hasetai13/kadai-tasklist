<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; // 追加

class UsersController extends Controller
{
    public function index()//ユーザー一覧表示
    {
        $users = User::orderBy('id', 'desc')->paginate(10);

        return view('users.index', [
            'users' => $users,
        ]);
    }
    
        public function show($id)//ユーザー詳細画面
    {
        $user = User::find($id);

        return view('users.show', [
            'user' => $user,
        ]);
    }
}
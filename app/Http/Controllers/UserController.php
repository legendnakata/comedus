<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function store(Request $request){
        // ユーザー名とパスワードを取得
        $name = $request->input('name');
        $password = $request->input('password');

        // ユーザーをデータベースから取得
        $user = User::where('user_name', $name)->first(); 

        // ユーザーが存在し、パスワードが一致するか確認
        if ($user && password_verify($password, $user->user_pass)) { 
            // 認証成功の処理
            return view('mypage', ['user_id' => $user->user_id]); 
        } else {
            // 認証失敗の処理
            return back()->withErrors(['name' => 'ユーザーネームまたはパスワードが間違っています。']);
        }
    }

    public function registerpage(){
        return view('/registerpage');
    }

    public function register(Request $request) {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:20|unique:user,user_name',
                'password' => 'required|string|min:8|confirmed',
            ]);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'バリデーションエラー: ' . $e->getMessage()]);
        }
    
        // ユーザーの作成
        $user = new User();
        $user->user_name = $validatedData['name'];
        $user->user_pass = password_hash($validatedData['password'], PASSWORD_DEFAULT);//ハッシュ化
    
        // ユーザーをデータベースに保存
        if ($user->save()) {
            return redirect('/')->with('success', 'ユーザー登録が完了しました。ログインしてください。'); // リダイレクトに変更
        } else {
            return back()->withErrors(['error' => 'ユーザーの保存に失敗しました。']);
        }
    }
}

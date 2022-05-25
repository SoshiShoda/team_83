<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /**
     * ログイン画面表示
     * 
     * @return Response
     */
    public function index()
    {
        return view ('admin.login');
    }


    /**
     * ログイン機能
     * 
     * @param Request 
     * @return Response
     */
    public function check(Request $request)
    {
        //  ※ログインチェックはblade側のチェックのみとする（require,email判定）

        //$requestの情報を代入
        $email = $request->email;
        $password = $request->password;

        //DBと照合してemailが一致するデータを探す
        $userdata = DB::table('users')->where('email', $email)->first();

        // ユーザーが存在しない場合エラーメッセージを返しlogin画面に戻す
        if(empty($userdata)){
            $error_message = '入力されたメールアドレスに該当するデータがありません';
            
            $view = view('admin.login', [
                'message'  => $error_message,
                'email'    => $email,
                'password' => $password,
            ]);
            return $view;
        }

        //ログイン機能（パスワード(ハッシュ値のpassword)チェックをする）
        if ($password != $userdata->password) {
            //パスワード不一致の場合 はエラーメッセージを返しlogin画面に戻す
            $error_message = 'パスワードが違います。';
            $view = view('admin.login', [
                'message'  => $error_message,
                'email'    => $email,
                'password' => $password,
            ]);
            return $view;
        }

        // //DBから取ってきたデータをセッションに保存
        // $request->session()->put('id', $userdata->id);
        // $request->session()->put('name', $userdata->name);
        // $request->session()->put('work_id', $userdata->work_id);
        // $request->session()->put('role',  $userdata->role);

        return redirect('product_list');  
    }
}


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // *********************************************************************
    // 会員登録画面
    // *********************************************************************
    /**
     * 初期表示
     * @return Response
     */
    public function register_index(){
        return view('user.register');
    }

    /**
     * データ登録
     * @param Request $request
     * @return Response
     */
    public function register_insert(Request $request){
        // チェック
        $request->validate([
            'user_name'=>'required|max:50',
            'post_code'=>'required|max:7',
            'prefecture'=>'required|max:4',
            'municipality'=>'required|max:191',
            'apartment'=>'max:191',
            'email'=>['required','max:191',Rule::unique('users')->ignore($request->email),'email:rfc,dns'],
            'phone_number'=>'required|max:11',
            'birthday'=>'required|date',
            'occupation'=>'required|max:50',
            'gender'=>'required|max:10',
            'password'=>'required|min:4|max:128',
        ]);

        $users = new User();
        $users->user_name    = $request->user_name;
        $users->post_code    = $request->post_code;
        $users->prefecture   = $request->prefecture;
        $users->municipality = $request->municipality;
        $users->apartment    = $request->apartment;
        $users->email        = $request->email;
        $users->phone_number = $request->phone_number;
        $users->birthday     = $request->birthday;
        $users->occupation   = $request->occupation;
        $users->gender       = $request->gender;
        $users->password     = $request->password;
        $users->created_at   = now();
        $users->save();

        return redirect('/memberRegistrationComp');
    }
    


    public function user_edit(User $user_id)
    {
        return view('user/user_edit',[
        'user_id'=>$user_id,
        ]);
    }
    public function user_update(Request $request,User $user_id)
    {
        $request->validate([
            'user_name'=>'required|max:50',
            'post_code'=>'required|max:7',
            'prefecture'=>'required|max:4',
            'municipality'=>'required|max:191',
            'apartment'=>'max:191',
            'email'=>['required','max:191',Rule::unique('users')->ignore($user_id->id),'email:rfc,dns'],
            'phone_number'=>'required|max:11',
            'birthday'=>'required|date',
            'occupation'=>'required|max:50',
            'gender'=>'required|max:10',
            'password'=>'required|min:4|max:128',
        ]);
        
        $user_edit = User::where('id',$user_id->id)->first();
        $user_edit->user_name = $request->user_name;
        $user_edit->post_code = $request->post_code;
        $user_edit->prefecture = $request->prefecture;
        $user_edit->municipality = $request->municipality;
        $user_edit->apartment = $request->apartment;
        $user_edit->email = $request->email;
        $user_edit->phone_number = $request->phone_number;
        $user_edit->birthday = $request->birthday;
        $user_edit->occupation = $request->occupation;
        $user_edit->gender = $request->gender;
        $user_edit->password = $request->password;
        $user_edit->updated_at = now();
        $user_edit->save();
        return redirect('product_list');
    }
    
}


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function user_edit(User $user_id)
    {
        return view('user/user_edit',[
        'user_id'=>$user_id,
        ]);
    }
    public function user_update(Request $request)
    {
        $request->validate([
            'user_name'=>'required|max:50',
            'post_code'=>'required|max:7',
            'prefecture'=>'required|max:4',
            'municipality'=>'required|max:191',
            'apartment'=>'max:191',
            'email'=>'required|max:191|unique:users,email|email:rfc,dns',
            'phone_number'=>'required|max:11',
            'birthday'=>'required|date',
            'occupation'=>'required|max:50',
            'gender'=>'required|max:10',
            'password'=>'required|min:4|max:128',
            'password_confirmation'=>'password_confirmation',
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
        $user_edit->updated_at = now();
        $user_edit->save();
        return redirect('/user_edit/'.$user_id->id);
    }
    
}


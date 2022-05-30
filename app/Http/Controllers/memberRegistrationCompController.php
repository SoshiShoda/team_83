<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buy;

class memberRegistrationCompController extends Controller
{
    /**
     * 登録完了ページ 
     *
     * @param request $request
     * @return response
     *
     */
    public function index(Request $request)
    {
        return view('user.memberRegistrationComp');
    }
}

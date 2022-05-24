<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
Use App\Models\User;
Use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{

    /**
        * レビュー一覧
        *
        * @param Request $request
        * @return Response
        */
    public function post_list(User $user_id)
    {
        $post_lists = Review::with('product','user')
                            ->Where('user_id',$user_id->id)
                            ->where('review_status','active')
                            ->orderBy('updated_at', 'asc')
                            ->get();

        return view('user/post_list', [
            'post_lists'=>$post_lists,
            'user_id'=>$user_id,
        ]);
    }

    /**
    * レビュー登録画面
    * @param User $user_id,Product $product_id
    * @return Response
    */
    public function review_register(User $user_id,Product $product_id){
        return view('user/review_register',[
            'user_id'=>$user_id,
            'product_id'=>$product_id
        ]);
    }

    /**
    * レビュー登録
    *
    * @param Request $request, User $user_id,Product $product_id
    * @return Response
    */
    public function review_add(Request $request,User $user_id,Product $product_id){
        $request->validate([
            'review_rating'=>'required',
            'review_text' => 'required|max:191',
            'review_image'=> 'max:191',
        ]);

        $review_rating = $request->review_rating;
        $review_text = $request->review_text;
        $review_image = $request->review_image;
        if($review_image != null){
            $review_image_name = $request->file('review_image')->getClientOriginalName();
            $review_image_path=$request->file('review_image')->storeAs('public/review/'.$user_id->id.'/'.$product_id->id,now().'_'.$review_image_name);
        }else{
            $review_image_path=null;
        }
        Review::create([
            'user_id'=>$user_id->id,
            'product_id'=>$product_id->id,
            'review_rating'=> $request->review_rating,
            'review_text'=>$request->review_text,
            'review_image'=>$review_image_path
        ]);
        return redirect('/post_list/'.$user_id->id);
    }


    /**
    * レビュー編集画面
    * @param Request $request
    * @return Response
    */
    public function review_edit(User $user_id,Review $review_id){
        return view('user/review_edit',[
            'user_id'=>$user_id,
            'review_id'=>$review_id
        ]);
    }

        /**
    * レビュー編集
    * @param Request $request
    * @return Response
    */
    public function review_update(Request $request,User $user_id,Review $review_id){
        
        $request->validate([
            'review_rating'=>'required',
            'review_text' => 'required|max:191',
            'review_image'=> 'max:191',
        ]);

        $review_edit = Review::Where('id',$review_id->id)->first();
        $review_edit->review_rating = $request->review_rating;
        $review_edit->review_text = $request->review_text;
        $review_image = $request->review_image;
        if($review_image != null){
            $review_image_name = $request->file('review_image')->getClientOriginalName();
            $review_image_path = $request->file('review_image')->storeAs('public/review/'.$user_id->id.'/'.$review_id->product_id,now().'_'.$review_image_name);
            $review_edit->review_image = $review_image_path;
        }

        $review_edit->updated_at = now();
        $review_edit->save();
        return redirect('/post_list/'.$user_id->id);

    }

    public function review_delete(Request $request,User $user_id,Review $review_id){
        $review_delete = Review::Where('id',$review_id->id)->first();
        $review_delete->review_status = 'deleted';
        $review_delete->updated_at = now();
        $review_delete->save();
        return redirect('/post_list/'.$user_id->id);
    }
}

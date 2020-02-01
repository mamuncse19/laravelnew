<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PostController extends Controller
{
    public function post()
    {
    	$cat = DB::table('categories')->get();
    	return view('post.WritePost',compact('cat'));
    }

    public function postInsert(Request $request)
    {
    	$validatedData = $request->validate([
        'title' => 'required|max:255',
        'catId' => 'required',
        'catImage' => 'required|mimes:jpeg,png,jpg,bmp,PNG,JPG',
        'details' => 'required|max:500',
    ]);

    	$data = array();
    	$data['title'] = $request->title;
    	$data['category_id'] = $request->catId;
    	$data['details'] = $request->details;
    	$image = $request->file('catImage');

    	if($image){
    		$addstring = time();
    		$originName = $image->getClientOriginalExtension();
    		$name = $addstring.'.'.$originName;
    		$path = 'postImage/';
    		$url = $path.$name;
    		$success = $image->move($path,$name);
    		$data['image'] = $url;

    		DB::table('posts')->insert($data);
    		$sms = array(
    			'message' => 'Successfully post inserted',
    			'alert-type' => 'success'
    		);

    		return Redirect()->back()->with($sms);

    	}
    	
    
    }

    public function allPost()
    {
    	//$post = DB::table('posts')->get();

    	$post = DB::table('posts')
    	->leftJoin('categories','posts.category_id','=','categories.id')
    	->select('posts.*','categories.name')
    	->get();

    	return view('post.allPost')->with('post',$post);
    }

    public function viewPost($id)
    {
    	$post = DB::table('posts')
    	->join('categories','posts.category_id','=','categories.id')
    	->select('posts.*','categories.name')
    	->where('posts.id','=',$id)->first();

    	return view('post.viewPost')->with('post',$post);
    	
    }

    public function editPost($id)
    {
    	$cat  = DB::table('categories')->get();
    	$post = DB::table('posts')->where('id','=',$id)->first();

    	return view('post.editPost',compact('cat','post'));
    }

    public function updatePost(Request $request,$id)
    {
    	$validatedData = $request->validate([
        'title' => 'required|max:255',
        'catId' => 'required',
        'catImage' => 'mimes:jpeg,png,jpg,bmp,PNG,JPG',
        'details' => 'required|max:500',
    ]);

    	$data = array();
    	$data['title'] = $request->title;
    	$data['category_id'] = $request->catId;
    	$data['details'] = $request->details;
    	$image = $request->file('catImage');

    	if($image){
    		$addstring = time();
    		$originName = $image->getClientOriginalExtension();
    		$name = $addstring.'.'.$originName;
    		$path = 'postImage/';
    		$url = $path.$name;
    		$success = $image->move($path,$name);
    		$data['image'] = $url;
    		unlink($request->oldImage);
    		DB::table('posts')->where('id','=',$id)->update($data);
    		$sms = array(
    			'message' => 'Successfully post updated',
    			'alert-type' => 'success'
    		);

    		return Redirect('allPost')->with($sms);

    	}else{
    		$data['image'] = $request->oldImage;
    		DB::table('posts')->where('id','=',$id)->update($data);
    		$sms = array(
    			'message' => 'Successfully post updated',
    			'alert-type' => 'success'
    		);

    		return Redirect('allPost')->with($sms);
    	}
    }
}

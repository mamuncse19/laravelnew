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
    
    }
}

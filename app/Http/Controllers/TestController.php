<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TestController extends Controller
{
    public function about()
    {
    	return view('pages.about');
    }

    public function contact()
    {
    	return view('pages.contact');
    }

    public function student()
    {
    	return view('pages.student');
    }

    public function index()
    {
        $post = DB::table('posts')->join('categories','posts.category_id','=','categories.id')->select('posts.*','categories.name','categories.slug')
        ->orderBy('posts.id','desc')->paginate(2);
        return view('pages.index',compact('post'));
    }
}

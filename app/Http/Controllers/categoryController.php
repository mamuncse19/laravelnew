<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class categoryController extends Controller
{
    public function addCategory()
    {
    	return view('post.categoryEntry');
    }

    public function categoryInsert(Request $req)
    {
    	$data = array();
    	$data['name'] = $req->name;
    	$data['slug'] = $req->slug;
    	$query = DB::table('categories')->insert($data);

    	if($query){
    		$sms = array(
    			'message' => 'Category inserted successfully.',
    			'alert-type' => 'success'
    		);
    		return Redirect()->back()->with($sms);
    	}else{
    		$sms = array(
    			'message' => 'Something went wrong.',
    			'alert-type' => 'error'
    		);
    		return Redirect()->back()->with($sms);
    	}

    }
}

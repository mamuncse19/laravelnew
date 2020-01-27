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

    public function categoryInsert(Request $request)
    {
    	$validatedData = $request->validate([
        'name' => 'required|unique:categories|max:25|min:2',
        'slug' => 'required|unique:categories|max:25|min:2',
    	]);

    	$data = array();
    	$data['name'] = $request->name;
    	$data['slug'] = $request->slug;
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

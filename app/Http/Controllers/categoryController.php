<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function addCategory()
    {
    	return view('post.categoryEntry');
    }
}

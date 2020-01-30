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
            return Redirect('allCategory')->with($sms);
        }else{
            $sms = array(
                'message' => 'Something went wrong.',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($sms);
        }

    }

    public function allCatRead()
    {
        $allCategory = DB::table('categories')->get();

        return view('post.allCategory',compact('allCategory'));
    }

    public function viewCategory($x)
    {
        $cat = DB::table('categories')->where('id',$x)->first();
        return view('post.viewCategory')->with('cat',$cat);
    }

    public function deleteCategory($id)
    {
        $delcat = DB::table('categories')->where('id',$id)->delete();
        if($delcat){
            $sms = array(
                'message' => 'Deleted Sucessfully',
                'alert-type' => 'success'
            );
            return Redirect('allCategory')->with($sms);
        }
    }

    public function editCategory($a)
    {
        $cat = DB::table('categories')->where('id',$a)->first();
        return view('post.editCategory')->with('cat',$cat);

    }

    public function updateCategory(Request $request,$id)
    {
        $validatedData = $request->validate([
        'name' => 'required|max:25|min:2',
        'slug' => 'required|max:25|min:2',
        ]);

        $data = array(
            'name' =>$request->name ,
            'slug' =>$request->slug );
        $cat = DB::table('categories')->where('id',$id)->update($data);
        if($cat){
            $sms = array(
                'message' => 'Category updated successfully.',
                'alert-type' => 'success'
            );
            return Redirect('allCategory')->with($sms);
        }else{
            $sms = array(
                'message' => 'Nothing Updated.',
                'alert-type' => 'error'
            );
            return Redirect('allCategory')->with($sms);
        }
    }

    
}

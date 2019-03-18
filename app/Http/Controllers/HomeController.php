<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
	use App\User;
	use App\Category;
	use App\Post;

class HomeController extends Controller
{
    public function home(Request $request)
    {
    		$categories = Category::all();

    if ($request->keyword==null|| $request->keyword=="") {
			$posts= Post::paginate(20);
    }else{
    	$posts=Post::where('title' , 'like' , "%$request->keyword%")->paginate(20);
    	$posts->withPath("?keyword=" . $request->keyword);
    }

	return view( 'welcome', compact('categories', 'posts'));
    }
    public function posts($id)
    {
    
	$categories = Category::all();
	$posts= Post::where('id','=',$id)->first();
	return view( 'post-details', compact('categories', 'posts'));

    }
    public function postsByCategory($cateId)
    {   
        $categories = Category::all();

        $posts=Post::where('cate_id' , "$cateId")->paginate(20);
        return view( 'welcome', compact('categories', 'posts'));


    }
}

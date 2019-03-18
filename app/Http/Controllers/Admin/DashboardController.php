<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
	use App\User;
	use App\Category;
	use App\Post;
class DashboardController extends Controller
{
    public function index()
    {
    	$totalCate= Category::count();
    	$totalPost= Post::count();
    	$totalUser= User::count();
    	
    	return view('admin.main',
			    	[
			    		"totalCate"=>$totalCate,
			    		"totalPost"=>$totalPost,
			    		"totalUser"=>$totalUser,


			    	]);
    }
}

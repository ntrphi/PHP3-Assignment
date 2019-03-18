<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
class PostController extends Controller
{
    public function index(Request $request){
        if ($request->keyword==null|| $request->keyword=="") {
            $posts= Post::paginate(20);
    }else{
        $posts=Post::where('title' , 'like' , "%$request->keyword%")->paginate(20);
        $posts->withPath("?keyword=" . $request->keyword);
    }
    	return view('admin.post.index', 
    				[
    					'posts' => $posts
    				]);
    }
    public function remove($id){
    	$post = Post::find($id);
    	if($post != null){
    		$post->delete();
    	}
    	return redirect(route('post.list'));
    }
    public function add(){
    	$post = new Post();
    	$cates = Category::all();
    	return view('admin.post.form', 
    				[
    					'post' => $post,
    					'cates' => $cates
    				]);
    }
    public function edit($id){
    	$post = Post::find($id);
    	if($post != null){
	    	$cates = Category::all();
	    	return view('admin.post.form', 
	    				[
	    					'post' => $post,
	    					'cates' => $cates
	    				]);
    	}
    	return redirect(route('post.list'));
    }
    public function save(Request $request){
        $validatedData = $request->validate([
                'title' => [
                    'required',
                    Rule::unique('posts')->ignore($request->id),
                    'max:255'
                ],
                'image' => 'image',
                'author' => 'required',
                'short_desc' => 'required | max: 255',
                'content' => 'required | max:255'

            ],
            [
                'title.required' => 'Vui lòng nhập tiêu đề',
                'title.unique' => 'Tiêu đề đã tồn tại',
                'title.max' => 'Độ dài tối đa không vượt quá 191 ký tự',
                'image.image' => 'Yêu cầu định dạng file ảnh',
                'author.required' => 'Không được bỏ trống trường này',
                'short_desc.required' => 'Vui lòng nhập nội dung',
                'short_desc.max' => 'Độ dài tối đa không vượt quá 191 ký tự',
                'content.required' => 'Vui lòng nhập nội dung',
                'content.max' => 'Độ dài tối đa không vượt quá 191 ký tự'



            ]
        );


    	if($request->id == null){
    		$model = new Post();
    	}else{
    		$model = Post::find($request->id);
    	}

        $model->fill($request->all());

        if ($request->hasFile('image')) {
            // lay ra duoi anh
            $ext = $request->image->extension();
            // lay ten anh go
            $filename = $request->image->getClientOriginalName();
            // sinh ra ten anh moi theo dang slug
            $filename = str_slug(str_replace("." . $ext, "", $filename));
            
            // ten anh + string random + duoi
            $filename = $filename . "-" . str_random(20) . "." . $ext;
            // luu anh 
            $path = $request->image->storeAs('bai-viet', $filename);
            // gan gia tri duong anh anh moi vao trong model
            $model->image = "uploaded/$path";
        }

    	$model->save();
    	return redirect(route('post.list'));
    }
}
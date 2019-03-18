<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use Illuminate\Validation\Rule;


class CateController extends Controller
{
    public function index()
    {
    	$cate= Category::all();
    	return view('admin.category.cate-list', 
		    [
				'cate' => $cate
		    ]);
    }

     public function remove($id){
    	$cate = Category::find($id);
    	if($cate != null){
    		$cate->delete();
    	}
    	return redirect(route('cate.list'));
    }
     public function add(){
        $cate = new Category();
        return view('admin.category.form', 
                    [
                        'cate' => $cate,
                    ]);
    }
    public function edit($id){
        $cate = Category::find($id);
        if($cate != null){
            return view('admin.category.form', 
                        [
                            'cate' => $cate,
                        ]);
        }
        return redirect(route('cate.list'));
    }
    public function save(Request $request){
        $validatedData = $request->validate([
                'name' => [
                    'required',
                    Rule::unique('categories')->ignore($request->id),
                    'max:100'
                ],
                'image' => 'image',
                'short_desc' => 'required | max: 255',

            ],
            [
                'name.required' => 'Vui lòng nhập tên danh mục ',
                'name.unique' => 'Tên danh mục đã tồn tại',
                'name.max' => 'Độ dài tối đa không vượt quá 191 ký tự',
                'image.image' => 'Yêu cầu định dạng file ảnh',
                
                'short_desc.required' => 'Vui lòng nhập nội dung',
                'short_desc.max' => 'Độ dài tối đa không vượt quá 191 ký tự',
                



            ]
        );


        if($request->id == null){
            $model = new Category();
        }else{
            $model = Category::find($request->id);
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
            $path = $request->image->storeAs('category', $filename);
            // gan gia tri duong anh anh moi vao trong model
            $model->image = "uploaded/$path";
        }

        $model->save();
        return redirect(route('cate.list'));
    }
}



<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use App\Post;
use App\Category;
use App\User;
use Illuminate\Validation\Rule;
use Auth;
use App\Role;

class UserController extends Controller
{
        public function index()
    {
    	$user= User::all();
    	return view('admin.user.user-list', 
		    [
				'user' => $user,

		    ]);
    }

    public function remove($id){
    	$user = User::find($id);
    	if($user != null){
    		$user->delete();
    	}
    	return redirect(route('user.list'));
    }
    public function add(){

        $user = new User();
    	$roles= Role::all();

        return view('admin.user.form', 
                    [
                        'user' => $user,
						'roles' => $roles

                    ]);
    }
    public function edit($id){
        $user = User::find($id);

        if($user != null){
    		$roles= Role::all();

            return view('admin.user.form', 
                        [
                            'user' => $user,
							'roles' => $roles

                        ]);
        }
        return redirect(route('user.list'));
    }
    public function changepass($id){
        $user = User::find($id);
        return view('admin.user.password-edit', 
                        [
                            'user' => $user,

                        ]);

    }
    public function PassSave(Request $request){

    		$validatedData=$request->validate(
    			[
    				'password'  => [
                	'required',
                	'max:20', 'min:4',  'alpha_num'
                				]
    			],
    			[
    			'password.required' => 'Vui lòng nhập nội dung',
                'password.max' => 'Độ dài tối đa không vượt quá 20 ký tự',
                'password.min' => 'Mật khẩu không được ít hơn 4 kí tự',
                'password.alpha_num' => 'Mật khẩu chỉ chứa chữ và số',
    			]
    		);
	        $model = User::find($request->id);

    		$old_pass= $request->old_pass;
    		$password= $request->password;
    		if (!Hash::check($old_pass, $model->password)) {
				return redirect( route('change-pass', ['id' => Auth::user()->id]))->withErrors([
            'msg' => 'Mật khẩu cũ không chính xác'
             ]);    			
    		}
    		elseif ($old_pass==$password) {
    			return redirect(route('change-pass', ['id' => Auth::user()->id]))->withErrors([
            'msg' => 'Mật khẩu trùng'
             ]);
    		}

	        $model->fill(['password'=>Hash::make($password)]);
            $model->save();
            return redirect(route('user.list'));




    }
    public function save(Request $request){


        if($request->id == null){
        	$validatedData = $request->validate([
                'name' => [
                    'required',
                    Rule::unique('users')->ignore($request->id),
                    'max:100'
                ],
                'email' => [
                    'email',
                    'required',
                    Rule::unique('users')->ignore($request->id),
                    'max:100'
                ],
                'password'  => [
                	'required',
                	'max:20', 'min:4',  'alpha_num'
                ]

            ],
            [
                'name.required' => 'Vui lòng nhập tên',
                'name.unique' => 'Tên đã tồn tại',
                'name.max' => 'Độ dài tối đa không vượt quá 100 ký tự',
                'email.email' => 'Email khong dung dinh dang',
                'email.required' => 'Vui lòng nhập tên',
                'email.unique' => 'Email đã tồn tại',
                'email.max' => 'Độ dài tối đa không vượt quá 100 ký tự',
                
                'password.required' => 'Vui lòng nhập nội dung',
                'password.max' => 'Độ dài tối đa không vượt quá 20 ký tự',
                'password.min' => 'Mật khẩu không được ít hơn 4 kí tự',
                'password.alpha_num' => 'Mật khẩu chỉ chứa chữ và số',
            ]
        );
            $model = new User();
            $request->merge(['password'=>Hash::make($request->password)]);
            $model->fill($request->all());


        }else{
        	$validatedData = $request->validate([
                'name' => [
                    'required',
                    Rule::unique('users')->ignore($request->id),
                    'max:100'
                ],
                'email' => [
                    'email',
                    'required',
                    Rule::unique('users')->ignore($request->id),
                    'max:100'
                ]

            ],
            [
                'name.required' => 'Vui lòng nhập tên',
                'name.unique' => 'Tên đã tồn tại',
                'email.email' => 'Email khong dung dinh dang',

                'name.max' => 'Độ dài tối đa không vượt quá 100 ký tự',
                'email.required' => 'Vui lòng nhập tên',
                'email.unique' => 'Email đã tồn tại',
                'email.max' => 'Độ dài tối đa không vượt quá 100 ký tự',
            ]
        );
        $model = User::find($request->id);
        $model->fill(['name'=>$request->name,'email'=> $request->email], 'role');


        }

        $model->save();
        return redirect(route('user.list'));
    }
}

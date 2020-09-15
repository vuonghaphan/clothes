<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\User;
use Botble\Assets\Assets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getLogin()
    {
        \Assets::removeScripts(['slick', 'slick-custom']);
        if (Auth::guard('web')->check()){
            return redirect()->route('home')->with('warning','Bạn đã đăng nhập');
        }
        return view('client.auth.login');
    }
    public function postLogin(request $request)
    {
        $data = $request->only('email','password');
        if(Auth::guard('web')->attempt($data)){
            return redirect()->route('home')->with('success','Đăng nhập thành công');
        }
        return back()->with('error','Đăng nhập thất bại');
    }
    public  function getRegister() {

        \Assets::removeScripts(['slick', 'slick-custom']);
        if (Auth::guard('web')->check()){
            return redirect()->route('home')->with('warning','Bạn đã đăng nhập');
        }
        return view('client.auth.register');
    }

    public function postRegister(request $request){
        $request->validate([
            'name' => 'required|min:2|max:20',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:2',
            're_password' => 'same:password',
        ],
        [
            'name.required' => 'Tên không được để trống',
            'name.min' => 'Tên Quá ngắn',
            'name.max' => 'Tên quá dài',
            'email.required' => 'Email không được để trống',
            'email.unique' => 'Email đã bị trùng',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu quá ngắn',
            're_password.same' => 'Mật khẩu không khớp',
        ]);
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $user = User::create($data);
        if ($user->id){
            return redirect()->route('get.login')->with('success','Đăng ký thành công');
        }
        return redirect()->back()->with('error','Đăng ký thất bại');
    }
}

<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\RateLimiter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Common\Constants;
use App\Models\User;

class SessionController extends Controller
{
    protected $maxAttempts = 3;
    protected $decayMinutes = 60;

    public function create(){
        return view('admin.pages.auth.login');
    }
    public function store(){
        $message=[
            'email.required' => 'Mời nhập e-mail !',
            'password.required' => 'Mời nhập Mật khẩu !',
        ];
        $this->validate(request(), [
            'email'    => 'required|email',
            'password' => 'required',
        ],$message);
        $key = "login|" . request('email').'|'.request()->ip();
        $remember = request('remember')==1 ? true : false;
        if (RateLimiter::tooManyAttempts($key,$this->maxAttempts)) {
            // Xử lý khóa tài khoản ở đây
            $user= User::where('email',request('email'))->first();
            if($user){
               $user->update(['status'=>Constants::DISABLE_ACCOUNT]); 
            }
            return redirect()->back()->with('error',"Tài khoản của bạn tạm thời dừng hoạt động do đăng nhập sai quá nhiều | Vui lòng iên hệ với quản trị viên để được hỗ trợ !");
        }

        if (!auth()->attempt(request(['email', 'password']),$remember)) {
            RateLimiter::hit($key,$this->decayMinutes);
            return redirect()->back()->with('error',"Tài khoản hoặc mật khẩu không hợp lệ !")->with('retriesLeft',RateLimiter::retriesLeft($key, $this->maxAttempts));
        }

        if (auth()->user()->status == Constants::DISABLE_ACCOUNT) {
            $this->logout();
            return redirect()->back()->with('error',"Tài khoản của bạn đã bị vô hiệu hóa !");
        }


        RateLimiter::clear($key);
        return redirect()->route('cp-admin.category.index');
    }
    public function logout(){
        if(auth()->user()){
            auth()->logout();
        }
        return redirect()->route('cp-admin.category.index');
    }
}

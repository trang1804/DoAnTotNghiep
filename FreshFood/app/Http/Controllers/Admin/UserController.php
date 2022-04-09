<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\Controller;
use App\Models\User;


class UserController extends Controller
{
    public function getDanhSach()
    {
        $user = User::all();
        return view('admin.layout.user.list',['user'=>$user]);
    }

    public function getSua($id)
    {
        $user = User::find($id);
        return view('admin.layout.user.edit',['user'=>$user]);
    }

    public function postSua(Request $request,$id)
    {
        $this->validate($request,[
            'txtUser'=>'required|min:3'
        ],
        [
            'txtUser.required'=>'Bạn chưa nhập tên người dùng',
            'txtUser.min' => 'Tên người dùng phải có ít nhất 3 kí tự',
        ]);

        $user = User::find($id);
        $user->avatar = $request->avatar;
        $user->username = $request->txtUser;
        $user->fullname = $request->txtFullname;
        $user->email = $request->txtEmail;
        $user->password = bcrypt($request->password);
        $user->phone = $request->txtPhone;
        $user->address = $request->txtAddress;
        $user->role = $request->role;
        $user->status = $request->status;
        $user->save();
        return redirect('admin/user/edit/'.$id)->with('thongbao','Sửa thành công!!!');
    }

    public function getThem()
    {
        return view('admin.layout.user.add');
    }

    public function postThem(Request $request)
    {
        $this->validate($request,[
            'txtUser'=>'required|min:3',
            'txtFullname'=>'required',
            'txtEmail'=>'required|email|unique:users,email',
            'txtPass'=>'required|min:3|max:10',
            'txtRePass'=>'required|same:txtPass',
            'avatar' => 'required',
            'txtPhone' => 'required|min:10',
            'txtAddress' => 'required'
        ],
        [
            'txtUser.required'=>'Bạn chưa nhập tên người dùng',
            'txtFullname.required'=>'Bạn chưa nhập họ tên người dùng',
            'txtUser.min' => 'Tên người dùng phải có ít nhất 3 kí tự',
            'txtEmail.required'=>'Bạn chưa nhập email',
            'txtEmail.email'=>'Bạn chưa nhập đúng định dạng mail!!!',
            'txtEmail.unique'=>'Email đã tồn tại!!!',
            'txtPass.required'=>'Bạn chưa nhập mật khẩu!!!',
            'txtPass.min'=>'Mật khẩu phải có ít nhất 3 kí tự',
            'txtPass.max'=>'Mật khẩu chỉ được phép tối đa 10 kí tự!!!',
            'txtRePass.required'=>'Bạn chưa nhập lại mật khẩu!!!',
            'txtRePass.same'=>'Mật khẩu nhập lại chưa đúng!!!',
            'avatar' => 'Bạn chưa cập nhật ảnh đại diện!!!',
            'txtPhone.required' => 'Bạn chưa nhập số điện thoại',
            'txtPhone.min' => 'Bạn chưa nhập đúng số điện thoại',
            'txtAddress' => 'Bạn chưa nhập địa chỉ',
        ]);

        $user = new User;
        $user->avatar = $request->avatar;
        $user->username = $request->txtUser;
        $user->fullname = $request->txtFullname;
        $user->email = $request->txtEmail;
        $user->password = bcrypt($request->password);
        $user->phone = $request->txtPhone;
        $user->address = $request->txtAddress;
        $user->role = $request->role;
        $user->status = $request->status;
        $user->save();
        return redirect('admin/user/add')->with('thongbao','Thêm thành công!!!');
    }

    public function postSearch(Request $request)
    {
        $key = $request->key;
        $user = User::where('username', 'LIKE', '%' . $key . '%')
        ->orWhere('email','LIKE','%' . $key . '%')
        ->orWhere('role','LIKE','%' . $key . '%')
        ->paginate();
        return view('admin/user/search',['user'=>$user,'key'=>$key]);
    }

    public function getXoa($id)
    {
        $user = User::find($id);
        $user->delete();
        
        return redirect('admin/user/list')->with('thongbao','Xóa thành công!!!');
    }
    
    // Login
    public function getLoginAdmin()
    {
        return view('admin.login');
    }

    public function postLoginAdmin(Request $request)
    {
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required|min:3|max:32'
        ],[
            'email.required' => 'Bạn chưa nhập Email',
            'password.required' => 'Bạn chưa nhập Password',
            'password.min' => 'Password không được nhỏ hơn 3 kí tự',
            'password.max' => 'Password không được lớn hơn 32 ký tự'
        ]);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect('admin/layout/user/list');
        } else {
            return redirect('admin/login')->with('thongbao','Đăng nhập không thành công');
        }
    }
}


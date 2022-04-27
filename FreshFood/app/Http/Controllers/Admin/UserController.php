<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Common\Constants;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function proFile()
    {
        return view('admin.pages.auth.profile');
    }
    public function proFileStore(Request $request)
    {
      
        $this->validate(request(),[
            'fullname'=>'required|min:3|max:100' ,
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'phone' => 'required|numeric|digits_between:10,12|unique:users,phone,'.auth()->user()->id,
            'address_detail'=>'required|min:3|max:200',
        ],
        [
            'fullname.required'=>'Bạn chưa nhập tên danh mục',
            'phone.unique' => 'Số điện thoại đã được sử dụng',
            'fullname.min'=>'Tên danh mục phải có độ dài từ 3 đến 100 ký tự',
            'fullname.max'=>'Tên danh mục phải có độ dài từ 3 đến 100 ký tự',
           'avatar.mimes'=>'Hình đại diện phải là tệp thuộc loại: image / jpeg, image / png.',
           'avatar.image'=>'Hình đại diện phải là tệp thuộc loại: image / jpeg, image / png.',
            'avatar.max'=>'avatar dụng lượng tối đa 2048mb',
            'phone.required'=>'Bạn chưa nhập slug',
            'phone.digits_between'=>'Độ dại số điện thoại không hợp lệ',
            'phone.numeric'=>'Số điện thoại không hợp lệ',
            'address_detail.required'=>'Bạn chưa nhập địa chỉ',
            'address_detail.unique' => 'Địa chỉ không được trùng',
            'address_detail.min'=>'Địa chỉ phải có độ dài từ 3 đến 200 ký tự',
            'address_detail.max'=>'Địa chỉ phải có độ dài từ 3 đến 200 ký tự',
        ]);


        if ($request->file('avatar') != null) {
            if (file_exists('storage/' . auth()->user()->avatar)) {
                unlink('storage/' . auth()->user()->avatar);
            }
            $pathAvatar = $request->file('avatar')->store('public/users/avatar');
            $pathAvatar = str_replace("public/", "", $pathAvatar);
        } else {
            $pathAvatar = auth()->user()->avatar;
        }
        $data = request(['fullname', 'phone', 'address_detail']);
        $data['avatar'] = $pathAvatar;
        $user = User::find(auth()->user()->id)->update($data);
        return redirect()->back()->with('message', 'Cập nhật thông tin thành công');
    }
    public function changePassword(){
        $customer = User::find(auth()->user()->id);
        $rules = [
            'current_password' => 'required|min:6',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|min:6'
        ];
        $messages = [
            'current_password.required' => 'Mời nhập mật khẩu hiện tại !',
            'current_password.min' => 'Mật khẩu hiện tại  ít nhất 6 ký tự!',
            'new_password.required' => 'Mời nhập mật khẩu mới !',
            'new_password.min' => 'Mật khẩu mới  ít nhất 6 ký tự!',
            'confirm_password.required' => 'Mời nhập mật khẩu nhập lại !',
            'confirm_password.min' => 'Mật khẩu nhập lại  ít nhất 6 ký tự!'
        ];
        $this->validate(request(),$rules, $messages);
        $data = request()->all();
        if(!Hash::check( $data['current_password'], $customer->password)){
            return redirect()->route('cp-admin.profile')->with('error', 'Mật khẩu hiện tại không chính xác, vui lòng thử lại');
        } else {
            $customer->update([
                'password' => bcrypt($data['confirm_password'])
            ]);
            return redirect()->route('cp-admin.logout')->with('message', 'Đổi mật khẩu thành công. Vui lòng đăng nhập lại');
            // return response()->json([
            //     'message' => 'Your password update succesfully!',
            //     'data' => new CustomerResource($this->customerRepository->find($customer->id)),
            //     'status' => 200
            // ]);
        }

    }



    public function postLoginAdmin(LoginRequest $request)
    {
       // dd($request->all(),Auth::check());
        // if(isset($request->remember)&& (int)$request->remember==1){
        //     if(Auth::login(['email'=>$request->email,'password'=>$request->password], $request->remember)){
        //         return redirect()->route('home');
        //     }
        // }
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect()->route('home');
        } 
        return redirect()->back()->with('errorLogin','Đăng nhập không thành công');
        
    }
    public function getDanhSach()
    {
        $user = User::where("role", Constants::CUSTOMER)->paginate(10);
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
        return view('admin.pages.categories.index');
    }


}


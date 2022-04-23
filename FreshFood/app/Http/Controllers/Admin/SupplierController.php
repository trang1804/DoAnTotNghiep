<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function getDanhSach()
    {
        $supplier = Supplier::all();
        return view('admin.layout.supplier.list',['supplier'=>$supplier]);
    }

    public function getSua($id)
    {
        $supplier = Supplier::find($id);
        return view('admin/layout/supplier/edit',['supplier'=>$supplier]);
    }

    public function postSua(Request $request,$id)
    { 
        $this->validate($request,[
            'name' => 'required|unique:suppliers,nameSupplier|min:3|max:100',
            'address' => 'required',
            'phone' => 'required'
        ],
        [
            'name.required' => 'Bạn chưa nhập tên danh mục',
            'name.unique' => 'Tên danh mục không được trùng',
            'name.min' => 'Tên danh mục phải có độ dài từ 3 đến 100 ký tự',
            'name.max' => 'Tên danh mục phải có độ dài từ 3 đến 100 ký tự',
            'address.required' => 'Bạn chưa nhập tên địa chỉ nhà cung cấp',
            'phone.required' => 'Bạn chưa nhập số điện thoại'
        ]);

        $supplier = Supplier::find($id);
        $supplier->nameSupplier = $request->name;
        $supplier->address = $request->address;
        $supplier->phone = $request->phone;
        $supplier->save();
        return redirect('admin/supplier/edit/'.$id)->with('thongbao','Sửa thành công!!!!');
    }

    public function getThem()
    {
        return view('admin.layout.supplier.add');
    }

    public function postThem(Request $request)
    {
        $this->validate($request,[
            'txtNameSupplier'=>'required|min:3|max:100|unique:suppliers,nameSupplier',
            'txtAddress' => 'required',
            'txtPhone' => 'required'
        ],
        [
            'txtNameSupplier.required'=>'Bạn chưa nhập tên danh mục',
            'txtNameSupplier.unique' => 'Tên danh mục không được trùng',
            'txtNameSupplier.min'=>'Tên danh mục phải có độ dài từ 3 đến 100 ký tự',
            'txtNameSupplier.max'=>'Tên danh mục phải có độ dài từ 3 đến 100 ký tự',
            'txtAddress.required' => 'Bạn chưa nhập tên địa chỉ nhà cung cấp',
            'txtPhone.required' => 'Bạn chưa nhập số điện thoại'
        ]);

        $supplier = new Supplier();
        $supplier->nameSupplier = $request->txtNameSupplier;
        $supplier->address = $request->txtAddress;
        $supplier->phone = $request->txtPhone;
        $supplier->save();
        return redirect('admin/supplier/add')->with('thongbao','Thêm thành công!!!');
    }

    public function getXoa($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();
        
        return redirect('admin/supplier/list')->with('thongbao','Xóa thành công!!!');
    }


    public function index(Request $request)
    {
        $suppliers = Supplier::filter(request(['search']))->orderBy('id','DESC')->paginate(10);
        $suppliers->load('products'); // gọi products bên model
        return view('admin.pages.supplier.index',compact('suppliers'));
    }

    public function create()
    {
        return view('admin.pages.supplier.create');
    }
    public function store(Request $request)
    {
      
        $this->validate(request(),[
            'nameSupplier'=>'required|min:3|max:100|unique:categories,nameCate',
            'address'=>'required|min:3|max:200',
            'phone' => 'required|numeric|digits_between:10,12',
            'status' => 'required|integer|min:0|max:1',
        ],
        [
            'nameSupplier.required'=>'Bạn chưa nhập tên danh mục',
            'nameSupplier.unique' => 'Tên danh mục không được trùng',
            'nameSupplier.min'=>'Tên danh mục phải có độ dài từ 3 đến 100 ký tự',
            'nameSupplier.max'=>'Tên danh mục phải có độ dài từ 3 đến 100 ký tự',
            'address.required'=>'Bạn chưa nhập địa chỉ',
            'address.unique' => 'Địa chỉ không được trùng',
            'address.min'=>'Địa chỉ phải có độ dài từ 3 đến 200 ký tự',
            'address.max'=>'Địa chỉ phải có độ dài từ 3 đến 200 ký tự',
            'phone.required'=>'Bạn chưa nhập slug',
            'phone.digits_between'=>'Độ dại số điện thoại không hợp lệ',
            'phone.numeric'=>'Số điện thoại không hợp lệ',
            'status.required' => 'Trạng thái Không hợp lệ',
            'status.integer' => 'Trạng thái Không hợp lệ',
            'status.min'=>'Trạng thái Không hợp lệ',
            'status.max'=>'Trạng thái Không hợp lệ',
        ]);

        Supplier::create($request->all());
       return redirect()->route('cp-admin.supplier.index')->with('message', 'Thêm nhà cung cấp thành công !');
    }
    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return view('admin.pages.supplier.edit', compact('supplier'));
    }
    public function update(Request $request ,$id)
    {   
       
        $supplier = Supplier::find($id);
        $this->validate(request(),[
            'nameSupplier'=>'required|min:3|max:100|unique:categories,nameCate',
            'address'=>'required|min:3|max:200',
            'phone' => 'required|numeric|digits_between:10,12',
            'status' => 'required|integer|min:0|max:1',
        ],
        [
            'nameSupplier.required'=>'Bạn chưa nhập tên danh mục',
            'nameSupplier.unique' => 'Tên danh mục không được trùng',
            'nameSupplier.min'=>'Tên danh mục phải có độ dài từ 3 đến 100 ký tự',
            'nameSupplier.max'=>'Tên danh mục phải có độ dài từ 3 đến 100 ký tự',
            'address.required'=>'Bạn chưa nhập địa chỉ',
            'address.unique' => 'Địa chỉ không được trùng',
            'address.min'=>'Địa chỉ phải có độ dài từ 3 đến 200 ký tự',
            'address.max'=>'Địa chỉ phải có độ dài từ 3 đến 200 ký tự',
            'phone.required'=>'Bạn chưa nhập slug',
            'phone.digits_between'=>'Độ dại số điện thoại không hợp lệ',
            'phone.numeric'=>'Số điện thoại không hợp lệ',
            'status.required' => 'Trạng thái Không hợp lệ',
            'status.integer' => 'Trạng thái Không hợp lệ',
            'status.min'=>'Trạng thái Không hợp lệ',
            'status.max'=>'Trạng thái Không hợp lệ',
        ]);
        $supplier->update($request->all());
        return redirect()->route('cp-admin.supplier.index')->with('message', 'Cập nhật nhà cung cấp thành công !');;
    }
    public function delete($id)
    {
        $Supplier = Supplier::find($id);
        $Supplier->load('products');
        if($Supplier){
            $Supplier->delete();
            return response()->json([
                'message' => "Xóa nhà phân phối thành công",
                'status' => "200"
            ]);
        }
        return response()->json([
            'message' => "Không tìm thấy nhà phân phối",
            'status' => "401"
        ]);
    }
}

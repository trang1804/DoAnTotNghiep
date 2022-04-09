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

}

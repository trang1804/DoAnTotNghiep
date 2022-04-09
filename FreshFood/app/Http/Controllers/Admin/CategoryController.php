<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function getDanhSach()
    {
        $category = Category::all();
        return view('admin.layout.category.list',['category'=>$category]);
    }

    public function getSua($id)
    {
        $category = Category::find($id);
        return view('admin/layout/category/edit',['category'=>$category]);
    }

    public function postSua(Request $request,$id)
    { 
        $this->validate($request,[
            'name' => 'required|unique:categories,nameCate|min:3|max:100'
        ],
        [
            'name.required' => 'Bạn chưa nhập tên danh mục',
            'name.unique' => 'Tên danh mục không được trùng',
            'name.min' => 'Tên danh mục phải có độ dài từ 3 đến 100 ký tự',
            'name.max' => 'Tên danh mục phải có độ dài từ 3 đến 100 ký tự'
        ]);

        $category = Category::find($id);
        $category->nameCate = $request->name;
        $category->save();
        return redirect('admin/category/edit/'.$id)->with('thongbao','Sửa thành công!!!!');
    }

    public function getThem()
    {
        return view('admin.layout.category.add');
    }

    public function postThem(Request $request)
    {
        $this->validate($request,[
            'txtCateName'=>'required|min:3|max:100|unique:categories,nameCate'
        ],
        [
            'txtCateName.required'=>'Bạn chưa nhập tên danh mục',
            'txtCateName.unique' => 'Tên danh mục không được trùng',
            'txtCateName.min'=>'Tên danh mục phải có độ dài từ 3 đến 100 ký tự',
            'txtCateName.max'=>'Tên danh mục phải có độ dài từ 3 đến 100 ký tự'
        ]);

        $category = new Category;
        $category->nameCate = $request->txtCateName;
        $category->save();
        return redirect('admin/category/add')->with('thongbao','Thêm thành công!!!');
    }

}

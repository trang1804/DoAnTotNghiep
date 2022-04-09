<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;


use GuzzleHttp\Handler\Proxy;

class ProductController extends Controller
{
    public function getDanhSach()
    {
        $product = Product::paginate();
        $supplier = Supplier::all();
        $category = Category::all();
        return view('admin.layout.product.list',['product'=>$product,'supplier'=>$supplier,'category'=>$category]);
    }

    public function getSua($id)
    {
        $product = Product::find($id);
        $supplier = Supplier::all();
        $category = Category::all();
        return view('admin/layout/product/edit',['product'=>$product,'supplier'=>$supplier,'category'=>$category]);
    }

    public function postSua(Request $request,$id)
    {
        $this->validate($request,[
            'txtName' => 'required|min:3|max:100',
            'txtQuantity' => 'required',
            'txtPrice' => 'required',

        ],
        [
            'txtName.required' => 'Bạn chưa nhập tên sản phẩm',
            'txtName.unique' => 'Tên sản phẩm không được trùng',
            'txtName.min' => 'Tên sản phẩm phải có độ dài từ 3 đến 100 ký tự',
            'txtName.max' => 'Tên sản phẩm phải có độ dài từ 3 đến 100 ký tự',
            'txtQuantity' => 'Số lượng sản phẩm không được trùng',
            'txtPrice' => 'Gía sản phẩm không được trùng'
        ]);

        $product = Product::find($id);
        $product->supplier_id = $request->supplier;
        $product->category_id = $request->category;
        $product->namePro = $request->txtName;
        $product->image = $request->image;
        $product->quantity = $request->txtQuantity;
        $product->price = $request->txtPrice;
        $product->status = $request->status;
        $product->save();
        return redirect('admin/product/edit/'.$id)->with('thongbao','Sửa thành công!!!!');
    }

    public function getThem()
    {
        $category = Category::all();
        $supplier = Supplier::all();
        $product = Product::all();
        return view('admin/layout/product/add',['product'=>$product,'category'=>$category,'supplier'=>$supplier]);
    }

    public function postThem(Request $request)
    {
        $this->validate($request,[
            'txtName' => 'required|unique:products,namePro|min:3|max:100',
            'txtQuantity' => 'required',
            'txtPrice' => 'required',

        ],
        [
            'txtName.required' => 'Bạn chưa nhập tên sản phẩm',
            'txtName.unique' => 'Tên sản phẩm không được trùng',
            'txtName.min' => 'Tên sản phẩm phải có độ dài từ 3 đến 100 ký tự',
            'txtName.max' => 'Tên sản phẩm phải có độ dài từ 3 đến 100 ký tự',
            'txtQuantity' => 'Số lượng sản phẩm không được trùng',
            'txtPrice' => 'Gía sản phẩm không được trùng'
        ]);

        $product = Product::all();
        $product->supplier_id = $request->supplier;
        $product->category_id = $request->supplier;
        $product->namePro = $request->txtName;
        $product->image = $request->image;
        $product->quantity = $request->txtQuantity;
        $product->price = $request->txtPrice;
        $product->status = $request->status;
        $product->save();

        return redirect('admin/layout/product/add')->with('thongbao','Thêm thành công!!!');
    }

    public function getXoa($id)
    {
        $product = Product::find($id);
        $product->delete();
        
        return redirect('admin/product/list')->with('thongbao','Xóa thành công!!!');
    }

    // public function postSearch(Request $request)
    // {
    //     $key = $request->key;
    //     $item = Item::where('item_name', 'LIKE', '%' . $key . '%')
    //     ->orWhere('price','LIKE','%' . $key . '%')
    //     ->orWhere('user_id','LIKE','%' . $key . '%')
    //     ->orWhere('category_id','LIKE','%' . $key . '%')
    //     ->paginate();        
    //     return view('admin/item/search',['item'=>$item,'key'=>$key]);
    // }
}

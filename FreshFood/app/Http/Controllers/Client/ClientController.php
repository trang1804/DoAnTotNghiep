<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Blogs;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Cart;
use App\Models\contact;
use App\Models\CategoryBlog;
use App\Models\order_detail;
use Illuminate\Support\Facades\View;
use App\Http\Requests\checkoutRequest;
use App\Common\Constants;

class ClientController extends Controller
{
    protected $categories;
    public function __construct()
    {
        $this->categories = Category::orderBy('id', 'DESC')->limit(15)->get();
        $this->categories->load('products');
        View::share('categories', $this->categories);
    }
    public function index()
    {

        $blogs = Blogs::where('status', 1)->orderBy('id', 'DESC')->get();
        // dd($this->currency_format(15656262));
        $category = $this->categories;
        return view('client.pages.home', compact('category', 'blogs'));
    }
    public function products(Request $request)
    {
        $categories_slug = '';
        // kiểm tra xem có  slug_cate không. nếu có thì lấy id catte từ slug
        if (request('slug_cate')) {
            $categories_slug = Category::where('slug', request('slug_cate'))->first();
            $categories_slug = $categories_slug ? $categories_slug : "";
        }
        $products = Product::filter(array_merge(request(['search', 'min', 'max', 'sort']), ['categories_slug' => $categories_slug]))
            ->where('status', 1)
            // ->orderBy('id', 'DESC')
            ->Paginate(15);

        $category = $this->categories->load('products');
        return view('client.pages.products', compact('category', 'products', 'categories_slug'));
    }

    public function productDetail(Request $request, $slug)
    {
        $categories_slug = '';
        $Product = Product::where('slug', $slug)->where('status', 1)->first();
        $Product->load('category');
        if (!$Product) {
            return redirect()->back();
        }
        $RelatedProducts = Product::where('slug', '!=', $slug)
            ->where('status', 1)
            ->where('category_id', $Product->category->id)
            ->orderBy('id', 'DESC')
            ->get();
        return view('client.pages.product', compact('Product', 'RelatedProducts'));
    }
    public function blogs(Request $request)
    {
        $categories_slug = '';
        // kiểm tra xem có  slug_cate không. nếu có thì lấy id catte từ slug
        if (request('Category_Blog')) {
            $categories_slug = CategoryBlog::where('slug', request('Category_Blog'))->first();
            $categories_slug = $categories_slug ? $categories_slug : "";
        }
        // dd($categories_slug);
        $CategoryBlogs = CategoryBlog::all();
        $CategoryBlogs->load('blogs');
        $blogs = Blogs::filter(array_merge(request(['search']), ['categories_slug' => $categories_slug]))->orderBy('id', 'DESC')->Paginate(15);
        $blogs->load('CategoryBlog'); // gọi blogs bên modelBlogSeed
        $blogs->load('User');

        return view('client.pages.blogs', compact('blogs', 'CategoryBlogs', 'categories_slug'));
    }
    public function blog(Request $request, $slug)
    {
        $categories_slug = '';
        $Blog = Blogs::where('slug_blog', $slug)->where('status', 1)->first();
        $Blog->load('CategoryBlog');
        if (!$Blog) {
            return redirect()->back();
        }
        $CategoryBlogs = CategoryBlog::all();
        $CategoryBlogs->load('blogs');

        $RelatedCategorys = Blogs::where('slug_blog', '!=', $slug)
            ->where('status', 1)
            ->where('cate_blog_id', $Blog->CategoryBlog->id)
            ->orderBy('id', 'DESC')
            ->get();
        $Blog->load('CategoryBlog'); // gọi blogs bên modelBlogSeed
        $Blog->load('User');
        //dd($Blog);
        return view('client.pages.blog', compact('Blog', 'CategoryBlogs', 'categories_slug', 'RelatedCategorys'));
    }
    public function addCart(Request $request, $product_id)
    {
        $Product = Product::where('id', $product_id)->where('status', 1)->first();
        $quantity = request(['quantity']) ? (int)request()->quantity : 1;
        if (!$Product) { // kiểm tra xem sản phẩm có tồn tại 
            return response()->json([
                'message' => "Không tìm thấy sản phẩm",
                'status' => "error"
            ], $status = 401);
        }
        if ($Product->quantity < (int)request()->quantity) { // kiểm tra xem sản phẩm còn đủ số lượng hàng để mua 
            return response()->json([
                'message' => "Sản phẩm hiện tại không còn đủ so với số lượng mua yêu cầu",
                'status' => "error"
            ], $status = 401);
        }
        $Cart = Cart::where('product_id', $product_id)->where('customer_id', auth()->user()->id)->first();
        if ($Cart) { // kiểm tra xem sản phẩm đã có trong giỏ hàng chưa nếu có r thì update thêm sl sản phẩm
            $quantitys = (int)$Cart->quantity + $quantity;
            $Cart->update(['quantity' => $quantitys]);
        } else {
            $data = array_merge(['customer_id' => auth()->user()->id, 'product_id' => $product_id, 'quantity' => $quantity]);
            Cart::create($data);
        }
        return response()->json([
            'message' => "Mua hàng thành công",
            'status' => "success"
        ]);
    }

    public function carts()
    {
        $carts = Cart::where('customer_id', auth()->user()->id)->orderBy('id', 'DESC')->get();
        $carts->load('user')->load('products');


        $totalMoney = 0;
        foreach ($carts as $cart) {
            $totalMoney += ceil($cart->products->price - (($cart->products->price * $cart->products->discounts) / 100));
        }
        return view('client.pages.carts', compact('carts', 'totalMoney'));
    }
    public function updateCarts(Request $request)
    {

        for ($i = 0; $i < count($request->id); $i++) {
            $carts = Cart::where('customer_id', auth()->user()->id)->where('id', $request->id[$i])->first();
            if ($carts) {
                $quantity = (int)$request->quantity[$i] == 0 ? 1 : (int)$request->quantity[$i];
                $carts->update(['quantity' => $quantity]);
            }
        }
        return redirect()->back();
    }

    public function checkout(checkoutRequest $request)
    {

        $order = Order::create(array_merge(request()->all(),['users_id'=>auth()->user()->id]));
        $carts = Cart::where('customer_id', auth()->user()->id)->orderBy('id', 'DESC')->get();
        $carts->load('user')->load('products');
        foreach ($carts as $cart) {
            $data['name'] = $cart->products->namePro;
            $data['slug'] = $cart->products->slug;
            $data['price'] = ceil($cart->products->price - (($cart->products->price * $cart->products->discounts) / 100));
            $data['quantity'] = $cart->quantity;
            $data['order_id'] = $order->id;
            OrderDetail::create($data);
            $cart->delete();
        }

        return redirect()->back()->with('message', 'Đơn hàng mua thành công');
    }
    public function order()
    {
        $Orders = Order::where('users_id', auth()->user()->id)->orderBy('id', 'DESC')->get();
        $Orders->load('order_detail');
        return view('client.pages.order',compact('Orders'));
    }
    public function order_detail(Request $request,$id)
    {
        $Orders = Order::where('users_id', auth()->user()->id)->where('id', $id)->first();
        $Orders->load('order_detail');
        if($Orders){
        //  dd($Orders);
          $totalMoney = 0;
          foreach ($Orders->order_detail as $order) {
              $totalMoney += $order->price * $order->quantity;
          }
        
            return view('client.pages.order_detail',compact('Orders','totalMoney'));
        }
        return redirect()->back()->with('error', 'Không tìm thấy sản phẩn của đơn hàng');
    }
    public function contact()
    {
        return view('client.pages.contact');
    }
    public function sentContact(Request $request)
    {
        $this->validate(
            request(),
            [
                'name' => 'required|min:3|max:100',
                'email' => 'required|email|unique:users,email',
            ],
            [
                'name.required' => 'Bạn chưa nhập họ và tên',
                'name.min' => 'Họ và tên phải có độ dài từ 3 đến 100 ký tự',
                'name.max' => 'Họ và tên phải có độ dài từ 3 đến 100 ký tự',
                'email.required' => 'Bạn chưa nhập email',
                'email.email' => 'Email không đúng định dạng',
            ]
        );
        contact::create(request()->all());
        return redirect()->back()->with('message', ' Giửi liên hệ thành công');
    }
}

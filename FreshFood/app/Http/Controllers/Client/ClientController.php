<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Blogs;
use App\Models\CategoryBlog;
use Illuminate\Support\Facades\View;

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
        // 
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

        return view('client.pages.blogs', compact('blogs','CategoryBlogs','categories_slug'));
    }
    public function blog(Request $request,$slug)
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
        return view('client.pages.blog', compact('Blog','CategoryBlogs','categories_slug','RelatedCategorys'));
    }
}

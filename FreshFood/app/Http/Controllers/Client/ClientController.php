<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Blogs;
use Illuminate\Support\Facades\View;

class ClientController extends Controller
{
    protected $categories;
    public function __construct()
    {
        $this->categories = Category::orderBy('id','DESC')->limit(15)->get();
        $this->categories->load('products'); 
        View::share('categories', $this->categories);
        
    }
    public function index(){
      // 
      $blogs = Blogs::where('status',1)->orderBy('id', 'DESC')->get();
     // dd($this->currency_format(15656262));
       $category = $this->categories; 
        return view('client.pages.home',compact('category','blogs'));
    }
    public function products(Request $request){
        $categories_slug='';
        // kiểm tra xem có  slug_cate không. nếu có thì lấy id catte từ slug
        if(request('slug_cate')){  
            $categories_slug = Category::where('slug',request('slug_cate'))->first();
            $categories_slug = $categories_slug ? $categories_slug : "";
        }

   //  dd($categories_slug,"xl");
        $products = Product::filter(array_merge(request(['']),['categories_slug'=>$categories_slug]))
        ->where('status',1)
        ->orderBy('discounts', 'DESC')
        ->orderBy('id', 'DESC')
        ->Paginate(20);

        $blogs = Blogs::where('status',1)->orderBy('id', 'DESC')->get();
     // dd($products,'pro');
         $category = $this->categories->load('products'); 
          return view('client.pages.products',compact('category','products','categories_slug'));
      }

}

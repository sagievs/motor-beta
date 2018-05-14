<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Post;
use App\Category;
use App\Product;

class AdminController extends Controller
{
    public function getLogin(){
        return view('admin.login');
    }
    public function postLogin(Request $request){
        $this->validate($request, [
            'email' => 'email|required',
            'password' => 'required'
        ]);
        if(auth()->attempt(['email' => $request['email'], 'password' => $request['password']]))
        {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->back();
    }
    public function getDashboard(){
        $pages = Page::get();
        $posts = Post::get();
        $categories = Category::get();
        $products = Product::get();
        return view('admin.dashboard', [
            'pages' => $pages,
            'posts' => $posts,
            'categories' => $categories,
            'products' => $products
        ]);
    }
    public function getLogout(){
        auth()->logout();
        return redirect()->route('home');
    }
}

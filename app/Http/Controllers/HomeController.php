<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $articles = Article::where('isActive', 1)->orderBy('created_at', 'DESC')->limit(10)->get();
        $categories = Category::with('articles')
                              ->where('isActive', 1)
                              ->orderBy('created_at', 'ASC')
                              ->limit(7)
                              ->get();
        return view('front.home', compact('articles', 'categories'));
    }

}

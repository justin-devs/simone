<?php

namespace App\Http\Controllers;

use App\Post;

class PagesController extends Controller
{
    function index(){
        $post = Post::latest()->get();
        return view('home')->with('post', $post);
    }
    function about(){
        return
            view('about');
    }
    function portfolio(){
        return
            view('portfolio');
    }
}

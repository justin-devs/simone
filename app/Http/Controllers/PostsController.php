<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index','show');
    }

    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(9);
        return view('blogs.index')->with('posts', $posts);
    }

    public function create()
    {
        return view('blogs.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required'
        ]);
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        return redirect('/blogs')->with('success', 'Post Created!');

    }

    public function show($id)
    {

       $post = Post::find($id);
       return view('blogs.show')->with('post', $post);
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('blogs.edit')->with('post', $post);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required'
        ]);
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        return redirect('/blogs')->with('success', 'Post updated!');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/blogs')->with('success', 'Post Removed!');
    }
}

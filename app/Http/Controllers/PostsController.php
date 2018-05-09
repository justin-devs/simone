<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Genre;
use App\Post;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index','show', 'podcast');
    }

    public function index()
    {
        $genres = Genre::where('type', 'blog')->paginate(9);
        return view('blogs.index')->with('genres', $genres)->with('title', 'Blog');
    }
    public function podcast()
    {
        $genres = Genre::where('type', 'podcast')->paginate(9);
        return view('blogs.index')->with('genres', $genres)->with('title', 'Podcast');
    }

    public function create()
    {
        $genres = Genre::all();
        $tags = Tag::all();
        return view('blogs.create')->with('genres', $genres)->with('tags', $tags);
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
        $post->genre_id = $request->input('genre_id');
        $post->save();
        $post->tags()->sync($request->tags,false);

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
        $genres = Genre::all();
        $tags = Tag::all();
        $tags2 = [];
        foreach ($tags as $tag){
            $tags2[$tag->id] = $tag->name;
        }
        return view('blogs.edit')->with('post', $post)->with('genres', $genres)->with('tags', $tags2);
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
        $post->tags()->sync($request->tags);
        return redirect('/blogs')->with('success', 'Post updated!');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/blogs')->with('success', 'Post Removed!');
    }
}

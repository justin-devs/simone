<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        $genres = Genre::where('type', 'blog')->paginate(4);
        return view('blogs.index')->with('genres', $genres)->with('title', 'Blog');
    }
    public function podcast()
    {
        $genres = Genre::where('type', 'podcast')->paginate(4);
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
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);
        if ($request->hasFile('cover_image')){
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' .time().'_'.$extension;
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);

        } else {
            $fileNameToStore = "placeholder.png";
        }
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->genre_id = $request->input('genre_id');
        $post->cover_image = $fileNameToStore;
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
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);
        if ($request->hasFile('cover_image')){
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' .time().'_'.$extension;
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);

        }
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');

        if ($request->hasFile('cover_image')){
            if($post->cover_image != "placeholder.png"){
                Storage::delete('public/cover_images/'.$post->cover_image);
            }
            $post->cover_image = $fileNameToStore;
        }
        $post->save();
        $post->tags()->sync($request->tags);
        return redirect('/blogs')->with('success', 'Post updated!');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        if($post->cover_image != "placeholder.png"){
            Storage::delete('public/cover_images/'.$post->cover_image);
        }
        $post->delete();
        return redirect('/blogs')->with('success', 'Post Removed!');
    }
}

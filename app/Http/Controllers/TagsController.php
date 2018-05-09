<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tags = Tag::orderBy('created_at', 'desc')->get();
        return view('tags.index')->with('tags', $tags);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'tag' => 'required'
        ]);
        $tag = new Tag;
        $tag->name = $request->input('tag');
        $tag->save();

        return redirect('/tags')->with('success', 'Tag created successfully');
    }

    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        return redirect('/tags')->with('success', 'Tag Removed!');
    }
}

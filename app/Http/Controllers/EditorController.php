<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Session;

class EditorController extends Controller
{
    public function index(){
        return view('editor.index');
    }

    public function create(){
        return view('editor.create');
    }

    public function list(){
        $posts=Blog::all();
        return view('editor.list',['posts'=>$posts]);
    }
    public function edit($id){
        $posts = Blog::find($id);
        //dd($posts);
        return view('editor.edit',['posts'=>$posts]);
    } 

    public function store(Request $request){
        $image = time().'.'.$request->thumbnail->extension();
        $request->thumbnail->move(public_path('thumbnails'),$image);
        //dd($image);
        $title=$request->input('title');
        $author=$request->input('author');
        $content=$request->input('content');

        $post = new Blog;
        $post->title = $title;
        $post->author = $author;
        $post->content = $content; 
        $post->thumbnail = $image;
        //dd($post);
        $post->save();
        return back()->withSuccess('blog created successfully');
    }

    public function update(Request $request ,$id){
        $posts = Blog::find($id);
        $posts = $request->input('title');
        $posts = $request->input('author');
        $posts = $request->input('content');

        $posts->save();
        return back()->withSuccess('updated successfully');
    }
}

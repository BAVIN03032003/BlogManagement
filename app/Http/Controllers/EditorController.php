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
        $description=$request->input('short_description');

        $post = new Blog;
        $post->title = $title;
        $post->author = $author;
        $post->content = $content; 
        $post->thumbnail = $image;
        $post->short_description = $description;
        //dd($post);
        $post->save();
        return back()->withSuccess('blog created successfully');
    }

    public function update(Request $request, $id)
{
    // Retrieve the post by ID
    $post = Blog::find($id);

    // Check if the post exists
    if (!$post) {
        return back()->withErrors('Post not found.');
    }

    // Update the model's attributes
    $post->title = $request->input('title');
    $post->author = $request->input('author');
    $post->content = $request->input('content');
    $post->short_description= $request->input('short_description');

    // Save the changes to the database
    $post->save();

    // Return a success message
    return back()->withSuccess('Updated successfully');
}

public function preview(){
    $blogs = Blog::all();

    foreach ($blogs as $blog) {
        // Remove the curly braces from content, if necessary
        $blog->content = str_replace(['{{', '}}'], '', $blog->content);
    }
    return view('editor.preview',compact('blogs'));
}
}

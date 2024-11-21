<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $posts=Post::all();
    return view("posts.index",compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("posts.create"); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

        if ($request->hasFile("image"))
    {
        $imageName=$request->file("image")->getClientOriginalName() ."-" .time() .
         $request->file("image")->getClientOriginalExtension();

         $request->file("image")->move(public_path("/images/post"), $imageName);
    }
     Post::create(
        [ 
            "title"=>$request->title,
            "description"=>$request->description,
             "image"=>$imageName

        ]
        );
       return redirect()->route("posts.index")->with('success','posts add successfully');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    { /*$request->validate(
        [  'title'=>'required',
        'description'=>'required', 
        'image'=>'required|image|mimes:png,jpeg,jpg,gif,svg|max:2048',
    ]);
    $input= $request->all();*/
      
        if ($request->hasFile("image"))
    {
        $imageName=$request->file("image")->getClientOriginalName() ."-" .time() .
         $request->file("image")->getClientOriginalExtension();

         $request->file("image")->move(public_path("/images/post"), $imageName);
    }
    
    $post->update(
        [ 
            "title"=>$request->title,
            "description"=>$request->description,
             "image"=>$imageName

        ]
        );
       return redirect()->route("posts.index")->with('success','posts updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route("posts.index")
        ->with('success','posts deleted successfully');
       
    }
}

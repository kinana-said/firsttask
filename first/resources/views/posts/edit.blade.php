@extends('layouts.app')
@section("title","edit")
@section("content")

<div class="container mt-5">
  <h1 class="mb-5">Update  post</h1> 
  
    <div class="col align-self-start">
<a class="btn btn-primary" href="{{route('posts.index')}}">All Posts</a>
 </div>
  <form action="{{ route('posts.update',$post->id) }}" method="post"enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <div class="mb-3">
    <label for="title"class="form-label"><h3>title:</h3></label>
   
    <input type="text" name="title"   class="form-control form-control-lg" id="title" value="{{$post->title}}"><br/> 
</div>
    <div class="mb-3">
    <label for="description"class="form-label"><h3>description:</h3></label>
   <textarea   name="description" class="form-control" id="description">{{$post->description}}</textarea> 
</div>
<div class="mb-3">
<label for="image"class="form-label"><h3>image:</h3></label>

        <img  src="/images/post/{{ $post->image}}"width="300px">
        <input type="file" name="image" class="form-control" >
    </div>
   
   <input type="submit" class="btn btn-primary" name="submit" value="send">
  </form>
  </div>
@endsection
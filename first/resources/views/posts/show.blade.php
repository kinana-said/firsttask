@extends('layouts.app')
@section("title","show")
@section("content")


<br>
<div class="row">
    <div class="col align-self-start">
<a class="btn btn-primary" href="{{route('posts.index')}}">All posts</a>
 </div>
 </div>
   <br>
<div class="container p-5">

    <div class="card" >
     <div class="card-header">
     <h3>title:  {{$post->title}}</h3>
     </div>
    <div class="card-body">
     
    
     <div class="mb-3">
        <img  src="/images/post/{{ $post->image}}" width="200px">
        
    </div>
        
    <div class="mb-3">
        <p>{{$post->description}}</p>
    </div></div>
    
    

</div>
@endsection
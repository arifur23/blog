@extends('layouts.app')

@section('content')
<div style=" width: 900px; height: 480px; margin: 0 auto; background:#e2dede; ">
<div class="container" style="margin-top:40px;" >
<h2 class="display-4">Edit Your Post</h2>
<form action="/posts/{{$post->id}}" enctype="multipart/form-data" method="post">
  <div class="form-group">
    <label for="text">Title:</label>
    <input type="text" class="form-control" id="text" name="title" value="{{$post->title}}">
  </div>
  @csrf
  @method('PUT')
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Write Your Post</label>
    <textarea class="form-control" id="exampleFormControlTextarea1"value="{{$post->body}}" rows="3" name="body" >{{$post->body}}</textarea>
  </div>
  <div class="form-group">
    <label for="text">Upload File</label>
    <input type="file" class="form-control" id="text" name="image">
  </div>
  
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Update Post</button>
    </div>
  </div>
</form>
</div>  
</div>@include('partials.errors')

@endsection
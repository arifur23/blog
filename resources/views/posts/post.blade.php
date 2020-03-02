@extends('layouts.app')

@section('content')
<div class="main" style="width: 1050px; height: auto; margin: 0 auto; background:#E2DEDE ">
<div class="container" style="padding:30px;">
  <div class="row adjustRow " style="margin: 30px;">
    <div class="card" style="width: 18rem; margin:0 auto;">
    <h3></h3>
  <img class="card-img-top" src="{{$post->photo_name}}" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">{{$post->title}}</h5>
    <p class="card-text"> {{$post->body}} Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit Post</a>
    <a href=""><form action="/posts/{{$post->id}}" method="post" >@csrf @method('DELETE')<button type="submit" class="btn btn-primary" style="float:right;">Remove Post</button></form></a>

  </div>
</div>
    
    
  </div>
  
</div>

</div>
@include('partials.errors')

<section class="second" style="width: 1200px; height: auto; margin: 0 auto;">

</section>


@endsection
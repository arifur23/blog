@extends('layouts.app')

@section('content')
<div class="main" style="width: 1050px; height: auto; margin: 0 auto; background:#E2DEDE ">
<div class="container" style="padding:30px;">
  <div class="row adjustRow " style="margin: 30px;">
  @foreach( $posts as $post)
    <div class="card" style="width: 18rem;">
    <h3></h3>
  <img class="card-img-top" src="{{$post->photo_name}}" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">{{$post->title}}</h5>
    <p class="card-text"> {{$post->body}} Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="posts/{{$post->id}}" class="btn btn-primary">View Full Post</a>
  </div>
</div>
    @endforeach
    
  </div>
  @include('partials.errors')
</div>

</div>

<section class="second" style="width: 1200px; height: auto; margin: 0 auto;">

</section>


@endsection
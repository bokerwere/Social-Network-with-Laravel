@extends('main')
@section('title','|Homepage' )


@section('stylesheets')
<link rel="stylesheet" type="text\css" href="styles.css">
@endsection
@section('content')
<div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                  <h1>Welcome to My Blog!</h1>
                  <p class="lead">Thank you so much for visiting. This is my test website built with Laravel. Please read my popular post!</p>
                  <p><a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a></p>
                </div>
            </div>
        </div> <!-- end of header .row -->
<div class="row">
<div class="col-md-8">
  @foreach($posts as $post)
<div class="post">
<h2> {{$post->title}}</h2>
<p>{{substr($post->body,0,50)}}{{strlen($post->body)>50 ?"....":""}}</p>
<a href="{{url('blog/'.$post->slug)}}" class="btn btn-primary ">ReadMore</a>
</div>
<hr>
@endforeach
</div>
<div class="col-md-3">
<h2>sideBar<h2>
</div>
</div>
@endsection

@section('scripts')
<script>
</script>
@endsection

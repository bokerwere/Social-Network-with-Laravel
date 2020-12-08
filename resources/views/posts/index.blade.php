@extends('main')
@section('title','|Index')
@section('content')
<div class="row">
<div class="col-md-10">
<h1>All Posts</h1>
</div>
<div class="col-md-2" >
<a href="{{route('posts.create')}}" class=" btn-primary btn-lg btn-block btn-h1-spacing" >CreateNewPost</a>
</div>
<div class="col">
<hr>
</div>
</div>
<div class="row">
<div class="col">
<table class="table">
<thead>
<th>#</th>
<th>Title</th>
<th>Body</th>
<th>Created at</th>
</thead>
<tbody>
@foreach($posts as $post)
<tr>
<th>{{$post->id}}</th>
<td>{{$post->title}}</td>
<td>{{substr($post->body,0 ,50)}}{{strlen($post->body)>50 ? '...':''}}</td>
<td>{{date('M,j Y',strtotime($post->created_at))}}</td>
<td><a href="{{route('posts.edit',$post->id)}}" class="btn-primary btn-sm">Edit</a> 
 <a href="{{route('posts.show',$post->id)}}" class="btn-info btn-sm">view</a></td>
</tr>
@endforeach
</tbody>


</table>
<div class="text-center">
    {!!$posts->links();!!}
</div> 
</div>
</div>
</hr>
@stop 
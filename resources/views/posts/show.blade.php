@extends('main')
@section('title','|view post')
@section('content')
<div class="row">

<div class="col col-sm-8"> 

<h1>{{$post->title}}</h1>
<p class="lead"> {{$post->body}}<p>
<hr>
<div class="tags">
@foreach($post->tags as $tag)
<span class="label label-default">{{$tag->name}}</span>
@endforeach
</div>
<div id="backend-comment" sytle="margin-top:50px;"> 
<h3>Comment <small>{{$post->comments->count()}}  total</small></h3>
<table class="table ">
<THead>
<tr>
<th>Name</th>
<th>Email</th>
<th>Comments</th>
<th>#Action</th>
</tr>
</THead>
<tbody>
@foreach($post->comments as $comment)
<tr>
<td>{{$comment->name}}</td>
<td>{{$comment->email}}</td>
<td>{{$comment->comment}}</td>
<td 
style="float:none;"><a href="{{route('comments.edit',$comment->id)}}" class=" btn-info btn-sm" >update</a>
  
<a href="{{route('comments.delete',$comment->id)}}" class="btn-warning btn-sm">delete</a>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>

<div class="col-md-4">
<div class="well">
<label>Url:</label>
<p><a href="{{route('blog.single',$post->slug)}}">{{url($post->slug)}}</a></p>
 <h5>Category:</h5>
<p>{{$post->category->name}}</p>
<dl class="dl-horizontal">
<dt>Created At:</dt>
<dd>{{date('M j ,Y H:ia', strtotime($post->created_at))}}</dd>
</dl>
<dl class="dl-horizontal">
<dt>Last Updated:</dt>
<dd>{{date('M j ,Y H:ia', strtotime($post->created_at))}}</dd>
</dl>
</div>
<hr>
<div class="row">
<div class="col-md-6">
{!!Html::linkRoute('posts.edit','Edit',array($post->id),array('class'=>'btn btn-primary btn-block btn-sm'))!!}
</div>
<!--deleting post -->
<div class="col-md-6">
    {!! Form::open(['route'=>['posts.destroy',$post->id],'method'=>'DELETE'])!!}
    {!!Form::submit('Delete',['class'=>'btn btn-danger btn-block btn-sm'])!!}
    {!! Form::close() !!}
</div>
</div>
<div class="row">
<div class="col col-md-12">
{{Html::linkRoute('posts.index','<<see all posts',[],['class'=>'btn btn-default btn-block'])}}
</div>
</div>
</div>
</div>
</div>
<hr>
@endsection

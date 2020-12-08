@extends('main')
@section('title',"|$tag->name")
@section('content')



<div class="row">
<div class="col-md-6 ">
<h1>{{$tag->name}} Tag <Small>{{$tag->posts()->count()}} Posts</small></h1>
</div>
<div class="col-md-2 ">
<a href="{{route('tags.edit',$tag->id)}}"class="btn btn-primary btn-sm pull-right  btn-block" style="margin-top:20px">Edit</a>
</div>
<div class="col-md-2 " style="margin-top:20px" >

{{Form::open(['route'=>['tags.destroy',$tag->id],'method'=>'DELETE'])}}
    {{Form::submit('Delete',['class'=>'btn btn-danger btn-block btn-sm'])}}
    {{Form::close() }}
</div>
</div>


<div class="row">
<div class="col-12">
<table class="table">
<thead>
<tr>
<th>#</th>
<th>Title</th>
<th>Tags</th>
<th></th>
</tr>
</thead>
<tbody>
@foreach($tag->posts as $post)
<tr>
<th>{{$post->id}}</th>
<td>{{$post->title}}</td>
<td>@foreach($post->tags as $tag)
<Span class="label  label-default">{{$tag->name}}</Span>
@endforeach
</td>
<td>
<a href="{{route('posts.show',$post->id)}}"class="btn btn-default">view</a>
</td>


</tr>
@endforeach
</tbody>
</table>
</div>
</div>

@endsection
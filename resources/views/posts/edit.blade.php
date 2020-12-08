@extends('main')
@section('title','|Edit Blog Post')
@section('content')
<div class="row">
{!!Form::model($post, ['route'=>['posts.update',$post->id],'method'=>'PUT'])!!}
<div class=" col-md-8"> 
{{Form::label('title','Title:')}}
{{Form::text('title',null,['class'=>'form-control input-lg'])}}
{{Form::label('slug','Slug:')}}
{{Form::text('slug',null,['class'=>'form-control input-lg'])}}
{{Form::label('category_id','Category:')}}
{{Form::select('category_id',$categories,null,['class'=>'form-control input-lg'])}}
{{Form::label('tags','Tag:')}}
{{Form::select('tags[]',$tags,null,['class'=>'form-control input-lg','multiple'=>'multiple'])}}
{{Form::label('body','Post Body:')}}
{{Form::textarea('body',null,['class'=>'form-control input-lg'])}}
</div><!--end col -->
<div class="col-md-4">
<div class="well">
<p>Created At:</p>
<p>{{date('M j ,Y ', strtotime($post->created_at))}}</p>
<p>Last Updated:</p>
<p>{{date('M j ,Y ', strtotime($post->created_at))}}</p>
</div>
<hr>
<div class="row">
<div class="col-sm-6">
{!!Html::linkRoute('posts.show','cancel',array($post->id),array('class'=>'btn btn-warning btn-block '))!!}
</div>
<div class="col-sm-6">
    {{Form::submit('save changes',['class'=>'btn btn-success btn-block'])}}
</div>
</div>
</div>
</div>  
{!!Form::close()!!}
</div>
</div>   
<hr>
@endsection

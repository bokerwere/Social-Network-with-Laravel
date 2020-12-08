@extends('main')
<?php $titleTag=htmlspecialchars($post->title);?>
@section('title',"|$titleTag")
@section('content')
<div class="row">
<div class="col col-md-8 col-md-offset-2">
<h1>{{$post->title}}</h1>
 <p>{{$post->body}}</p>
 <hr>
 <p>Posted In:{{$post->category->name}}</p>
</div>
</div>
<div class="row">
<div class="col col-md-8 col-md-offset-2">
    <h3 class="comments-title"> <span class="glyphicon glyphicon-comment"></span>{{$post->comments->count()}}<strong>Comments</strong></h3>
@foreach($post->comments as $comment)
<div class="comment">
<div class="auth-info" >
<img src=""  class="auth-image"> 
<div class="auth-name">
<h4>{{$comment->name}}</h4>
<p>{{$comment->created_at}}</p>
</div>
</div>

<div class="comment-content">
<small class="text-muted"><p>Comment:{{$comment->comment}}</p></small>
</div>
</div>


@endforeach

</div>
</div>
 







<div class="row">
<div id="form-comment" class="col-md-8 col-md-offset-2">
{{Form::open(['route'=>['comments.store',$post->id],'method'=>'POST'])}}
<div class="row">
<div class="col-md-6">
{{Form::label('name','Name:')}}
{{Form::text('name',null,['class'=>'form-control'])}}
</div>
<div class="col-md-6">
{{Form::label('email','Email:')}}
{{Form::text('email',null,['class'=>'form-control'])}}
</div>

<div class="col-md-12">
{{Form::label('comment','Comments:')}}
{{Form::textarea('comment',null,['class'=>'form-control','rows'=>'5'])}}

{{Form::submit('Add Comments',['class'=>'btn btn-success btn-block','style'=>'margin-top:15px;'])}}
</div>



</div>

{{Form::close()}}
</div>

</div>

@endsection
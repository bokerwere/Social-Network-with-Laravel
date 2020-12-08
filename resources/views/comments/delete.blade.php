@extends('main')
@section('title','|Delete Comment')

@section('content')
<div class="row">
<div class="col col-md-6 col-md-offset-3">
<h1>DELETE THIS COMMENT??</h1>
<p><strong>Name:</strong>{{$comment->name}}</p>
</p><strong>Email:</strong>{{$comment->email}}</p>
</p><strong>Comment:</strong>{{$comment->comment}}</p>

<hr>
    {!! Form::open(['route'=>['comments.destroy',$comment->id],'method'=>'DELETE'])!!}
    {!!Form::submit('DELETE THIS COMMENT',['class'=>'btn btn-danger btn-block btn-sm'])!!}
    {!! Form::close() !!}
</div>
</div>




@endsection
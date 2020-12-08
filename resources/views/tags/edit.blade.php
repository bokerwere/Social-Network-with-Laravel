@extends('main')
@section('title',"|Edit Tag")
@section('content')

<div class="row col-4">
<div class="col col-md-6 col-md-offset-3">
{{Form::model($tag,['route'=>['tags.update',$tag->id],'method'=>"PUT"])}}

{{Form::label('name','Name:')}}
{{Form::text('name',null,['class'=>'form-control'])}}
{{Form::submit('save changes',['class'=>'btn btn-success btn-block' ,'style'=>'margin-top:20px'])}}

{{Form::close()}}

</div>
</div>
@endsection
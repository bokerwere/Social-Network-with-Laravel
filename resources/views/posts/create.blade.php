@extends('main')
@section('title','|Create' )
@section('stylesheets')
{!! Html::style('css/parsley.css')!!}
{!! Html::style('css/select2.min.css')!!}

@endsection
@section('content')
<div class="row">
<div class="col col-md-6 col-md-offset-3">
<h1>Create New Post</h1>
{!! Form::open(['route' => 'posts.store','data-parsley-validate'=>'']) !!}
{{Form::label('title', 'Title:')}}
{{ Form::text('title',null, ['class'=>'form-control','required'=>'','maxlenth'=>'255'])}}
{{Form::label('slug', 'Slug:')}}
{{ Form::text('slug',null, ['class'=>'form-control','required'=>'','minlenth'=>'5','maxlenth'=>'255'])}}
{{Form::label('category_id', 'Category:')}}
<select name="category_id" class="form-control select2-multi">
@foreach($categories as $category)
<option value="{{$category->id}}">{{$category->name}}</option>
@endforeach
</select>



{{Form::label('tags', 'Tags:')}}
<select name="tags[]" class="form-control multi" multiple="multiple">
@foreach($tags as $tag)
<option value="{{$tag->id}}">{{$tag->name}}</option>
@endforeach
</select>

{{Form::label('body', 'Post Body:')}}
{{ Form::textarea('body',null, ['class'=>'form-control','required'=>''])}}
{{Form::submit('Create Post',array('class'=>'btn btn-success  btn-lg btn-block ', 'style'=>'margin-top:20px;'))}}

{!! Form::close() !!}
<hr>
</div>
</div>
 
@endsection

@section('script')

{!! Html::script('js/parsley.min.js')!!}
{!! Html::script('js/select2.min.js')!!} 
<script>
$(".multi").select2();

alert('load')
</script>
@endsection  
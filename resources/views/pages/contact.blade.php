
@extends('main')
@section('title','|Contact' )
@section('content')
<div class="row">
<div class="col col-md-8 col-md-offset-2">
<form action="">
<div class="form-group">
<label for="email">Email:</label>
<input type="email"  id="email" name="email" class="form-control">
</div>
<div class="form-group">
<label for="subject">Subject:</label>
<input type="text"  id="subject" name="subject" class="form-control">
</div>

<div class="form-group">
<label for="message">Message:</label>
<textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
</div>
<button type="submit" class="btn btn-primary btn-block">submit</button>
</form>
</div>
</div>
@endsection
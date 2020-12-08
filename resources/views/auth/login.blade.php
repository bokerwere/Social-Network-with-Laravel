@extends('main')

@section('content')
<div class="container">
    
        <div class="col-md-6 col-md-offset-3">
            <div class="well">
                <div class="card-header">login</div>

            
                   {!!Form::open()!!}
                   {{Form::label('email','Email:')}}
                   {{Form::email('email',null,['class'=>'form-control'])}}
                   {{Form::label('password','Password:')}}
                   {{Form::password('password',['class'=>'form-control'])}}
                   {{Form::checkbox('remember')}}{{'remember','Remember Me'}}
                       <br>
                   {{Form::submit('Login',['class'=>'btn btn-primary btn-block'])}}
                   {!!Form::close()!!}
                   <div class="row">
                   <div class="col">
                   <small>Need acount:<a href="{{route('register')}}">signup</a>
                   </small>
                   </div>
                   </div>
                </div>
           
        </div>
    </div>
</div>
@endsection
 
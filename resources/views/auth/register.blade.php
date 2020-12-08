@extends('main')

@section('content')
<div class="container">

        <div class="col-md-6 col-md-offset-3">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                

                   {!!Form::open(['route'=>'register'])!!}
                   {{Form::label('name','Name:')}}
                   {{Form::text('name',null,['class'=>'form-control'])}}
                   {{Form::label('email','Email:')}}
                   {{Form::email('email',null,['class'=>'form-control'])}}
                   {{Form::label('password','Password:')}}
                   {{Form::password('password',['class'=>'form-control'])}}
                   {{Form::label('password_confirmation','Confirm_password:')}}
                   {{Form::password('password_confirmation',['class'=>'form-control'])}}
                   
                       <br>
                   {{Form::submit('Register',['class'=>'btn btn-primary btn-block'])}}
                   {!!Form::close()!!}

                        
                
                </div>
            </div>
        </div>
</div>
@endsection

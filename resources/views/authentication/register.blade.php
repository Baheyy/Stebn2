@extends('hotelreceptionist.welcome')

@section('register')

{!! Form::open(['url' => 'register']) !!}

<div class ="container">

    <div class = "form-group"">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}

    </div>


    <div class = "form-group">

        {!! Form::label('email', 'E-mail Address:') !!}
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
    </div>

    <div class = "form-group">

        {!! Form::label('password', 'Password:') !!}
        {!! Form::password('password', ['class' => 'form-control']) !!}

    </div>

    <div class = "form-group">

        {!! Form::label('password_confirmation', 'Confirm Password:') !!}
        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}

    </div>

    <div>
        {!! Form::label('type', 'Register as a:') !!}
        {!! Form::select('type', ['User', 'Administrator', 'Hotel Receptionist'], null, ['class' => 'form-control']) !!}
    </div>
    <h1></h1>
    <div class = "form-group">

        {!! Form::submit(null, ['class' => 'btn btn-primary form-control']) !!}

    </div>

@include('errors/list')

</div>

{!! Form::close() !!}



@endsection
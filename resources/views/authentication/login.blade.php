@extends('app')

@section('content')

{!! Form::open(['url' => 'login']) !!}

<div class ="container">


    <div class = "form-group">

        {!! Form::label('email', 'E-mail Address:') !!}
        {!! Form::text('email', null, ['class' => 'form-control']) !!}

    </div>

    <div class = "form-group">

        {!! Form::label('password', 'Password:') !!}
        {!! Form::password('password', ['class' => 'form-control']) !!}

    </div>

    <h1></h1>
    <div class = "form-group">

        {!! Form::submit(null, ['class' => 'btn btn-primary form-control']) !!}

    </div>

@include('errors/list')

</div>

{{!! Form::close() !!}



@endsection
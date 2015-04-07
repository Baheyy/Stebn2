@extends('admin.welcome')
@section('bikes')

<h1></h1>
<h1></h1>
{!! Form::open(['url' => 'CreateBikes']) !!}

<div class ="container">

    <div class = "form-group"">
        {!! Form::label('type', 'Type:') !!}
        {!! Form::text('type', null, ['class' => 'form-control']) !!}
    </div>

    <div class = "form-group"">
        {!! Form::label('bike_station_id', 'Bike Station ID:') !!}
        {!! Form::text('bike_station_id', null, ['class' => 'form-control']) !!}
    </div>

    <div class = "form-group"">
        {!! Form::label('vendor', 'Vendor:') !!}
        {!! Form::text('vendor', null, ['class' => 'form-control']) !!}
    </div>

    <div class = "form-group"">
        {!! Form::label('features', 'Features:') !!}
        {!! Form::text('features', null, ['class' => 'form-control']) !!}
    </div>

    <div class = "form-group"">
        {!! Form::label('model', 'Model Number:') !!}
        {!! Form::text('model', null, ['class' => 'form-control']) !!}
    </div>

<div class = "form-group">

    {!! Form::submit(null, ['class' => 'btn btn-primary form-control']) !!}

</div>

@include('errors/list')

</div>

@endsection
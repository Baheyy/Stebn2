@extends('admin.welcome')
@section('bikestations')

<h1></h1>
<h1></h1>
{!! Form::open(['url' => 'CreateBikeStations']) !!}

<div class ="container">

    <div class = "form-group"">
    {!! Form::label('BatchSize', 'Batch size:') !!}
    {!! Form::text('BatchSize', null, ['class' => 'form-control']) !!}
</div>


<div class = "form-group"">
{!! Form::label('location', 'Location:') !!}
{!! Form::text('location', null, ['class' => 'form-control']) !!}
</div>

<div class = "form-group"">
{!! Form::label('maxCapacity', 'Max Capacity:') !!}
{!! Form::text('maxCapacity', null, ['class' => 'form-control']) !!}
</div>

<div class = "form-group"">
{!! Form::label('functional', 'Functional:') !!}
{!! Form::text('functional', null, ['class' => 'form-control']) !!}
</div>

<div class = "form-group">

    {!! Form::submit(null, ['class' => 'btn btn-primary form-control']) !!}

</div>

@include('errors/list')

</div>

@endsection
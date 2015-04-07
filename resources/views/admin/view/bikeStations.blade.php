@extends('admin.welcome')
@section('viewBikeStations')

{!! Form::open(['url' => 'viewBikeStations']) !!}

<div class ="container">

<div class = "form-group"">
    {!! Form::label('bikeStations', ' ') !!}
    {!! Form::select('bikeStations', $bikeStations->lists('location'), null, ['class' => 'form-control']) !!}
</div>

<div class = "form-group">

    {!! Form::submit(null, ['class' => 'btn btn-primary form-control']) !!}

</div>

@include('errors/list')

</div>

@endsection
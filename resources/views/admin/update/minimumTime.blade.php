@extends('admin.welcome')
@section('updateMinTime')
<h1></h1>

{!! Form::open(['url' => 'UpdateBikeTime']) !!}

<div class ="container">

    <div class = "form-group">
        {!! Form::label('minimum_time', 'Minimum Time:') !!}
        {!! Form::text('minimum_time', null, ['class' => 'form-control']) !!}
    </div>

    <h1></h1>
    <div class = "form-group">
        {!! Form::submit(null, ['class' => 'btn btn-primary form-control']) !!}
    </div>

    @include('errors/list')

</div>

@endsection
@extends('admin.welcome')
@section('updatePrice')
<h1></h1>

{!! Form::open(['url' => 'updatePrice']) !!}

<div class ="container">

    <div class = "form-group">
        {!! Form::label('price', 'Price:') !!}
        {!! Form::text('price', null, ['class' => 'form-control']) !!}
    </div>

    <h1></h1>
    <div class = "form-group">
        {!! Form::submit(null, ['class' => 'btn btn-primary form-control']) !!}
    </div>

    @include('errors/list')

</div>

@endsection
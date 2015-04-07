@extends('hotelreceptionist.welcome')
@section('viewCards')

{!! Form::open() !!}

    <div>
        {!! Form::label('type', ' ') !!}
        {!! Form::select('type', $cards->lists('id'), null, ['class' => 'form-control']) !!}
    </div>

{!! Form::close() !!}

@endsection
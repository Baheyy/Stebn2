@extends('Customer.welcome')
@section('ViewRentedBikes')

@foreach($bikes as $bike)
<ul>
    <li>
        {{$bike['type']}}
        <h5></h5>
        {{$bikestation->location}}
    </li>
</ul>
@endforeach

@endsection
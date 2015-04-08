@extends('app')

@section('content')

<div class="container">

    <h1> Hello User</h1>

    <button class="btn btn-default">
        <a href="/Customer/RentABike">Rent A Bike </a></button>
    <h1></h1>
    @yield('RentABike')
    <button class="btn btn-default">
        <a href="/Customer/ViewRentedBikes">View Rented Bikes </a></button>
    <h1></h1>
    @yield('ViewRentedBikes')

    <button class="btn btn-default">
        <a href="/Customer/ParkABike">Park A Bike</a></button>
    <h1></h1>

    @yield('ParkABike')
</div>




@endsection
@extends('app')

@section('content')

<div class="container">

<h1> Hello {{$user->name}}</h1>

<button class="btn btn-default">
    <a href="/admin/cards">Create Cards </a></button>
<h1></h1>
@yield('cards')
    <button class="btn btn-default">
        <a href="/admin/bikes">Create Bikes </a></button>
<h1></h1>
@yield('bikes')
    <button class="btn btn-default">
        <a href="/admin/bikestations">Create Bike Stations</a></button>
<h1></h1>
@yield('bikestations')

    <button class="btn btn-default">
        <a href="/admin/viewBikeStations"> View Bike Stations</a>
    </button>

@yield('viewBikeStations')
@yield('viewBikes')
</div>

@endsection
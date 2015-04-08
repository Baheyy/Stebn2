@extends('app')

@section('content')

<div class="container">

    <h1> Hello </h1>

    <button class="btn btn-default">
        <a href="/authentication/register">Create A New Customer </a></button>
<h5></h5>

    @yield('register')

<h5></h5>
    <button class="btn btn-default">
        <a href="/hotelreceptionist/viewCards">View Cards </a></button>

    @yield('viewCards')

    <h1></h1>

</div>
@endsection

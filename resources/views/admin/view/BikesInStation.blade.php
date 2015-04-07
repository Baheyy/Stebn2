@extends('admin.welcome')
@section('viewBikes')
<h1></h1>
@foreach($bikes as $bike)

<ul>
    <li>
       {{$bike['type']}}
    </li>
</ul>

@endforeach

@endsection
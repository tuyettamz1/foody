@extends('layouts.frontend')
@section('content')
@include('layouts.frontend.slider')
<ul>
	@foreach($places as $place)
	<li><a href="/dia-diem/{{$place->slug}}">{{$place->name}}</a></li>
	@endforeach
</ul>
@endsection
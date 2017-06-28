@extends('layouts.app')

<div>
	
</div>

@section('start')

<div class="start">
	
	<p>Welcome to Open Board</p>

	<h2>Read, Write, Explore, Discover...</h2>	

	<div class="start-welcome">
		@foreach($categories as $category)
			<a href="/categories/{{$category->id}}"><h3> {{ $category->name }} </h3></a>
		@endforeach	

	</div>

</div>


@endsection




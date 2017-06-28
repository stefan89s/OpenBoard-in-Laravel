@extends('layouts.app')

@section('content')

	<h1> {{ $post->title }} </h1>
	<p> {{ $post->article }} </p>

	@if(!Auth::guest())

		@if(Auth::user()->id == $post->user_id)

			<a href="/posts/{{$post->id}}/edit"><button class="btn btn-primary">Edit</button></a>
			<a href="/delete/{{$post->id}}"><button class="btn btn-danger">Delete</button></a>

		@endif
		
	@endif

@endsection
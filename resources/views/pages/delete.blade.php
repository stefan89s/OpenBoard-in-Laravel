@extends('layouts.app')

@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h1>Are you sure you want to delete the post:</h1>

		<h1> {{ $post->title }} </h1>

		<a href="/home"><button class="btn btn-success btn-block btn-lg form-spacing">Cancel</button></a>

		{!! Form::open(['action' => ['PostController@destroy', $post->id], 'method' => 'POST']) !!}

			{{ Form::hidden('_method', 'DELETE') }}
			{{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block btn-lg']) }}		
				
		{!! Form::close() !!}

		

	</div>
</div>

@endsection
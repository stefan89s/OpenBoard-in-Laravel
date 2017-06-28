@extends('layouts.app')

@section('content')

	<!--Form for editing posts and string in into database through update method-->
	{!! Form::open(['action' => ['PostController@update', $post->id], 'method' => 'POST']) !!}

		{{ Form::label('title', 'Title:')}}
		{{ Form::text('title', $post->title, ['class' => 'form-control  form-spacing']) }}

		{{ Form::label('article', 'Edit the Article:') }}
		{{ Form::textarea('article', $post->article, ['class' => 'form-control  form-spacing']) }}

		{{ Form::label('category_id', 'Category:') }}

			<select class="form-control  form-spacing" name="category_id">
				@foreach($categories as $category)
					<option value="{{$category->id}}"> {{ $category->name }} </option>
				@endforeach
			</select>

		{{ Form::hidden('_method', 'PUT') }}
		{{ Form::submit('Edit', ['class' => 'btn btn-success btn-block btn-lg form-spacing']) }}

	{!! Form::close() !!}

	<a href="/home"><button class="btn btn-danger btn-block btn-lg">Cancel</button></a>

@endsection
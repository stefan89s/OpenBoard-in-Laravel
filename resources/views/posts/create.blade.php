@extends('layouts.app')

@section('content')

	<!--Strong post into database-->
	{!! Form::open(['action' => 'PostController@store', 'method' => 'POST']) !!}

		{{ Form::label('title', 'Title:') }}
		{{ Form::text('title', null, ['class' => 'form-control form-spacing', 'placeholder' => 'Title']) }}

		{{ Form::label('article', 'Write the article:') }}
		{{ Form::textarea('article', '', ['class' => 'form-control form-spacing', 'placeholder' => 'Write the article']) }}

		{{ Form::label('category_id', 'Category:') }}

			<select class="form-control form-spacing" name="category_id">
				@foreach($categories as $category)
					<option value="{{$category->id}}"> {{ $category->name }} </option>
				@endforeach
			</select>

		{{ Form::submit('Post', ['class' => 'btn btn-success btn-block btn-lg']) }}

	{!! Form::close() !!}

@endsection
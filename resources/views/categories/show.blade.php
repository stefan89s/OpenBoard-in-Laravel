@extends('layouts.app')

@section('content')

<h1> {{ $category->name }} </h1>

<div class="article-space">
	@foreach($category->posts->reverse() as $posts) 

	<div class="article-box">
			<div class="article">
				<a href="/posts/{{$posts->id}}"><h2>{{ substr($posts->title, 0, 80)  }} {{ strlen($posts->title) > 80 ? "..." : "" }} </h2></a>
				<p>{{ substr($posts->article, 0, 100) }} {{ strlen($posts->article) > 100 ? "..." : "" }} </p>
				<p><strong> {{ $posts->user->name }} </strong> </p>

			</div>
		</div>

	@endforeach

</div>

<div class="categories">
	@foreach($categories as $category)
		<a href="/categories/{{$category->id}}"><h3> {{ $category->name }} </h3></a>
	@endforeach
</div>

@endsection
@extends('layouts.app')

@section('content')

<h1>All Posts</h1>

<!--Looping through all post one by one extrecting title, article and author-->
<div class="article-space">
	@foreach($posts as $post)
		<div class="article-box">
			<div class="article">
				<a href="/posts/{{$post->id}}"><h2>{{ substr($post->title, 0, 80)  }} {{ strlen($post->title) > 80 ? "..." : "" }} </h2></a>
				<p>{{ substr($post->article, 0, 100) }} {{ strlen($post->article) > 100 ? "..." : "" }} </p>
				<p><strong> {{ $post->user->name }} </strong> </p>
				<p> {{ $post->category->name }} </p>

			</div>
		</div>
	@endforeach
</div>

<div class="categories">
	@foreach($categories as $category)
		<a href="/categories/{{$category->id}}"><h3> {{ $category->name }} </h3></a>
	@endforeach
</div>

<div class="paginate">
	{{ $posts->links() }}
</div>	



@endsection
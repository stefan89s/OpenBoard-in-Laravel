@extends('layouts.app')

@section('content')

<div class="container">
   
    <div class="panel panel-default">
        <div class="panel-heading"><h3>Your Articles</h3></div>

        <div class="panel-body">
                <div class="row">
                <div class="col-md-12">
                    <table class="table">

                        <thead>
                            <th><h2>Title</h2></th>
                            <th><h2>Articles</h2></th>
                            <th><h2>Created</h2></th>
                            <th></th>
                        </thead>

                    <!--Showing the articles from database-->
                        <tbody>
                            @foreach($posts->reverse() as $post)</th>
                            <tr>
                              <th>  <a href="/posts/{{$post->id}}"><h3> {{ substr($post->title, 0, 100)  }} </h3></a>
                              <th>  <p> {{ substr($post->article, 0, 100) }} {{ strlen($post->article) > 100 ? "..." : "" }} </p></th>
                               <th> <small> {{ $post->created_at }}  </small></th>

                               <th><a href="/posts/{{$post->id}}/edit"><button class="btn btn-primary">Edit</button></a></th>
                               <th><a href="/delete/{{$post->id}}"><button class="btn btn-danger">Delete</button></a></th>

                              </tr> 
                            @endforeach

                        </tbody>

                    </table>

                </div>
            </div>
        </div> 
    </div>
</div>
@endsection

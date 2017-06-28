<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Session;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //pulling posts from database and passing them into index page
        $posts = Post::orderBy('id', 'desc')->paginate(9);
        $categories = Category::all();
        return view('posts.index')->with('posts', $posts)->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //creating a view for the create form
        $categories =  Category::all();
        return view('posts.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validating the data from the create form for storin
        //the post into database
        $this->validate($request, [
            'title' => 'required|max:255',
            'article' => 'required',
            'category_id' => 'required|integer'
        ]);

        //creating new object for a post
        $post = new Post;

        $post->title = $request->title;
        $post->article = $request->article;
        $post->user_id = auth()->user()->id;
        $post->category_id = $request->category_id;
        $post->save();

        //alerting the success flash session
        Session::flash('success', 'New article successfully published!');

        //redirecting to index page
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //pulling individual post and passing it for a riding on the 'show' page
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //finding a post for edit and passing it in a edid form
        $post = Post::find($id);
        $categories = Category::all();
        return view('posts.edit')->with('post', $post)->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validating the data from the edit form and updating
        //the post into database
        $this->validate($request, [
            'title' => 'required|max:255',
            'article' => 'required',
            'category_id' => 'required|integer'
        ]);

        //labeling the post for update into database
        $post = Post::find($id);

        $post->title = $request->title;
        $post->article = $request->article;
        $post->category_id = $request->category_id;
        $post->save();

        //alerting the success flash session
        Session::flash('success', 'The article successfully edited!');

        //redirecting to 'show' page
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('home');
    }
}

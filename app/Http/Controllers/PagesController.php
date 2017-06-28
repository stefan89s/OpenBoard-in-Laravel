<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PagesController extends Controller
{
    public function getIndex() {
    	$categories = Category::all();

    	return view('pages.index')->with('categories', $categories);
    }

    public function getDelete($id) {
    	$post = Post::find($id);

    	return view('pages.delete')->with('post', $post);
    }

}

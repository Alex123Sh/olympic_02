<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
	{ 
		$posts = \App\Models\Post::query() -> orderBy("created_at", "DESC") -> paginate(3); // -> get();
		dump($posts);//
		return view('posts.index', ["posts" => $posts ] );
	}
	
    public function show( $id )
	{ 
		$post = \App\Models\Post::findOrFail($id);
		return view('posts.show', ["post" => $post ] );		
	}	
	
	
}

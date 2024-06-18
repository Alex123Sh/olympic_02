<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
	{ 
	/*
		$posts = \App\Models\Post::query() -> orderBy("created_at", "DESC") -> limit(3) -> get();
		dump($posts);
		*/
		return view('home' );//, ["posts" => $posts ]
	}
}

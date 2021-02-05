<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function front()
    {
        $tags = Tag::latest()->get();
        return view('portfolio.home', compact('tags'));
    }

    public function works(Tag $tag)
    {
        $posts = $tag->posts;
        return view('portfolio.index', compact('tag', 'posts'));
    }
}

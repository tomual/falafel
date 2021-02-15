<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Settings;
use Illuminate\Http\Request;

class HomeController extends Controller
{
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
        $settings = Settings::find(1);
        return view('portfolio.home', compact('tags', 'settings'));
    }

    public function works(Tag $tag)
    {
        $posts = $tag->posts;
        $tags = Tag::latest()->get();
        $settings = Settings::find(1);
        return view('portfolio.index', compact('tag', 'tags', 'posts', 'settings'));
    }

    public function show(Post $post)
    {
        $tags = Tag::latest()->get();
        $tag = $post->tags->first();
        $settings = Settings::find(1);
        return view('portfolio.show', compact('tags', 'tag', 'post', 'settings'));
    }
}

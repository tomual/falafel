<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('posts.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'body' => ['max:2500'],
            'images' => ['required'],
            'images.*' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'tags' => 'exists:tags,id'
        ]);
        $post = new Post($validated);
        $post->user_id = auth()->user()->id;
        $images = array();
        foreach ($request->file('images') as $file) {
            $filename =  uniqid() . "." . $file->getClientOriginalExtension();
            $moved_file = $file->move(public_path('uploads'), $filename);
            $images[] = $filename;
        }
        if (empty($images)) {
            $request->session()->flash('error', 'There was an error uploading your images.');
            return redirect()->route('posts.create')->withInput();
        }
        $file = $request->file('thumbnail');
        $filename = uniqid() . "." . $file->getClientOriginalExtension();
        $file->move(public_path('uploads'), $filename);
        $post->thumbnail = $filename;
        $post->images = json_encode($images);
        $post->save();
        $post->tags()->attach(request('tags'));

        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::all();
        return view('posts.edit', compact('post', 'tags'));
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
        $validated = request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'body' => ['max:2500'],
            'images.*' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'tags' => 'exists:tags,id'
        ]);
        
        $post = Post::findOrFail($id);
        $images = json_decode($post->images, true);

        if ($request->file('images')) {
            foreach ($request->file('images') as $file) {
                $filename =  uniqid() . "." . $file->getClientOriginalExtension();
                $moved_file = $file->move(public_path('uploads'), $filename);
                $images[] = $filename;
            }
            if (empty($images)) {
                $request->session()->flash('error', 'There was an error uploading your images.');
                return redirect()->route('posts.create')->withInput();
            }
        }

        if (request()->input('remove')) {
            foreach (request()->input('remove') as $removeTarget) {
                $images = array_filter($images, function ($image) use ($removeTarget) {
                    return $image !== $removeTarget;
                });
            }
        }

        $file = $request->file('thumbnail');
        $filename = uniqid() . "." . $file->getClientOriginalExtension();
        $file->move(public_path('uploads'), $filename);
        $post->thumbnail = $filename;
        $post->images = json_encode($images);
        $post->save();
        $post->tags()->detach();
        $post->tags()->attach(request('tags'));

        $request->session()->flash('success', 'Post successfully edited.');
        return redirect("posts/{$post->id}/edit");
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
        return redirect("posts");
    }
}

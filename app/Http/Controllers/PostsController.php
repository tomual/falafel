<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post($this->validatedPost());
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

        $post->images = json_encode($images);
        $post->save();

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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function validatedPost()
    {
        return request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'body' => ['max:2500'],
            'images.*' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']
        ]);
    }
}

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Post</div>
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif
                @if (Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('error') }}
                    </div>
                @endif

                <div class="card-body">
                    <form method="POST" action="{{ route('posts.update', ['post' => $post->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="title" class="">Title</label>
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $post->title }}" required autocomplete="title" autofocus>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="body" class="">Post</label>
                            <input id="body" type="body" class="form-control @error('body') is-invalid @enderror" name="body" value="{{ old('body') ?? $post->body }}" required autocomplete="body">
                            @error('body')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="images" class="">Images</label>
                            <input type="file" class="form-control-file @error('images') is-invalid @enderror @if ($errors->get('images.*')) is-invalid @endif" multiple name="images[]">
                            @foreach ($errors->get('images.*') as $key => $value)
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $value[0] }}</strong>
                                </span>
                            @endforeach
                            @error('images')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        @foreach(json_decode($post->images) as $image)
                                <img src="{{ url('uploads/' . $image) }}" class="form-thumb">
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="remove-{{ $image }}" name="remove[]" value="{{ $image }}">
                                <label class="form-check-label" for="remove-{{ $image }}">Remove</label>
                            </div>
                        @endforeach


                        <div class="form-group">
                            <label class="label">Tags</label>
                            <select name="tags[]" multiple class="form-control @error('tags') is-invalid @enderror">
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}" @foreach($post->tags as $t) @if($tag->id == $t->id) selected="selected" @endif @endforeach>{{ $tag->name }}</option>
                                @endforeach
                            </select>
                            @error('tags')
                            <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>  
                        
                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

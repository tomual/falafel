@extends('portfolio.layout')

@section('title')
{{ $post->title }} &#8211; 
@endsection

@section('content')
<h1 class="page-title text-center w-100">{{ $post->title }}</h1>
<hr class="divider">
<div class="container">
    
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div>{!! nl2br($post->body) !!}</div>
        </div>
        <div class="col-lg-12 text-center">
            @foreach(json_decode($post->images) as $image)
            <img src="{{ url('uploads') }}/{{ $image }}" class="mt-5 mx-auto">
            @endforeach
        </div>
        <div class="col-12 text-center mt-5">
            <a href="{{ route('works', ['tag' => $tag->id]) }}" class="btn btn-link d-inline-block m-auto p-3 back-to">« Back to {{ $tag->name }}</a>
        </div>
    </div>
</div>

@endsection

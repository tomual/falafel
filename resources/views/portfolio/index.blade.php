@extends('portfolio.layout')

@section('content')
<h1 class="page-title text-center w-100">Concept Art</h1>
<hr class="divider">

@foreach ($posts as $post)
<div class="col-lg-4 pb-4 art">
    <a class="thumb" href="http://soulant.coco.lat/art/king-wizzard/" aria-hidden="true" tabindex="-1">
        <img width="323" height="323" src="{{ url('uploads') }}/{{ $post->thumbnail }}" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt=""/>            <div class="thumb-info">
            <div class="thumb-heading">{{ $post->title }}</div>
        </div>
    </a>
</div>
@endforeach

@endsection

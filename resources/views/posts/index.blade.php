@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><div class="float-left pt-2">All Posts</div> <a href="{{ route('posts.create') }}" class="float-right btn btn-primary">Create New</a></div>
                @if (Session::has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('error') }}
                </div>
                @endif

                <ul class="list-group list-group-flush">
                    @forelse ($posts as $post)
                        <li class="list-group-item">
                            {{ $post->title }}
                            <a href="" class="float-right ml-2 btn btn-outline-secondary btn-sm">Edit</a>
                            <a href="" class="float-right ml-2 btn btn-outline-secondary btn-sm">View</a>
                            <div class="float-right text-secondary small pt-1">{{ date('m/d/Y', strtotime($post->created_at)) }}</div>
                        </li>
                    @empty
                        <li class="list-group-item">No posts</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><div class="float-left pt-2">All Tags</div> <a href="{{ route('tags.create') }}" class="float-right btn btn-primary">Create New</a></div>
                @if (Session::has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('error') }}
                </div>
                @endif

                <ul class="list-group list-group-flush">
                    @forelse ($tags as $tag)
                        <li class="list-group-item">
                            {{ $tag->name }}
                            <a href="{{ route('tags.edit', ['tag' => $tag->id]) }}" class="float-right ml-2 btn btn-outline-secondary btn-sm">Edit</a>
                            <div class="float-right text-secondary small pt-1">{{ date('m/d/Y', strtotime($tag->created_at)) }}</div>
                        </li>
                    @empty
                        <li class="list-group-item">No tags</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

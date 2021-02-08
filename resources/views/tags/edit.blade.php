@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Tag</div>
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
                    <form method="POST" action="{{ route('tags.update', ['tag' => $tag->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name" class="">Name</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $tag->name }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('tags.index') }}" class="btn btn-outline-secondary">Cancel</a>
                            </form>
                            <form method="POST" action="{{ route('tags.destroy', ['tag' => $tag->id]) }}" class="d-inline">>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-secondary float-right" onclick="return confirm('Are you sure you want to delete this tag?')">Delete</button>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

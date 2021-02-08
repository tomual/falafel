@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Settings</div>
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
                    <form method="POST" action="{{ route('settings.update', ['post' => $settings->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="site_name" class="">Site Name</label>
                            <input id="site_name" type="text" class="form-control @error('site_name') is-invalid @enderror" name="site_name" value="{{ old('site_name') ?? $settings->site_name }}" required autocomplete="site_name" autofocus>
                            @error('site_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="cover_image" class="">Home Page Image</label>
                            <input type="file" class="form-control-file @error('cover_image') is-invalid @enderror" name="cover_image">
                            @error('cover_image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <img src="{{ url('uploads/' . $settings->cover_image) }}" class="form-thumb">

                        <hr>

                        <div class="form-group">
                            <label for="social_instagram" class="">Instagram URL</label>
                            <input id="social_instagram" type="text" class="form-control @error('social_instagram') is-invalid @enderror" name="social_instagram" value="{{ old('social_instagram') ?? $settings->social_instagram }}" autocomplete="social_instagram" autofocus>
                            @error('social_instagram')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="social_twitter" class="">Twitter URL</label>
                            <input id="social_twitter" type="text" class="form-control @error('social_twitter') is-invalid @enderror" name="social_twitter" value="{{ old('social_twitter') ?? $settings->social_twitter }}" autocomplete="social_twitter" autofocus>
                            @error('social_twitter')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="social_artstation" class="">ArtStation URL</label>
                            <input id="social_artstation" type="text" class="form-control @error('social_artstation') is-invalid @enderror" name="social_artstation" value="{{ old('social_artstation') ?? $settings->social_artstation }}" autocomplete="social_artstation" autofocus>
                            @error('social_artstation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="social_patreon" class="">Patreon URL</label>
                            <input id="social_patreon" type="text" class="form-control @error('social_patreon') is-invalid @enderror" name="social_patreon" value="{{ old('social_patreon') ?? $settings->social_patreon }}" autocomplete="social_patreon" autofocus>
                            @error('social_patreon')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="social_youtube" class="">YouTube URL</label>
                            <input id="social_youtube" type="text" class="form-control @error('social_youtube') is-invalid @enderror" name="social_youtube" value="{{ old('social_youtube') ?? $settings->social_youtube }}" autocomplete="social_youtube" autofocus>
                            @error('social_youtube')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="social_twitch" class="">Twitch URL</label>
                            <input id="social_twitch" type="text" class="form-control @error('social_twitch') is-invalid @enderror" name="social_twitch" value="{{ old('social_twitch') ?? $settings->social_twitch }}" autocomplete="social_twitch" autofocus>
                            @error('social_twitch')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        
                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('settings.index') }}" class="btn btn-outline-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

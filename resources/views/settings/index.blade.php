@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Settings</div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="site_name" class="font-weight-bold">Site Name</label>
                        <input id="site_name" type="text" class="form-control-plaintext" name="site_name" value="{{ $settings->site_name }}">
                    </div>

                    <div class="form-group">
                        <label for="email" class="font-weight-bold">Contact Email (hidden on site)</label>
                        <input id="email" type="text" class="form-control-plaintext" name="email" value="{{ $settings->email }}">
                    </div>

                    <div class="form-group">
                        <label for="cover_image" class="font-weight-bold">Home Page Image</label>
                    </div>
                    <img src="{{ url('uploads/' . $settings->cover_image) }}" class="form-thumb">

                    <hr>

                    <div class="form-group">
                        <label for="social_instagram" class="font-weight-bold">Instagram URL</label>
                        <input id="social_instagram" type="text" class="form-control-plaintext" name="social_instagram" value="{{ $settings->social_instagram ?? '-' }}">
                    </div>
                    <div class="form-group">
                        <label for="social_twitter" class="font-weight-bold">Twitter URL</label>
                        <input id="social_twitter" type="text" class="form-control-plaintext" name="social_twitter" value="{{ $settings->social_twitter ?? '-' }}">
                    </div>
                    <div class="form-group">
                        <label for="social_artstation" class="font-weight-bold">ArtStation URL</label>
                        <input id="social_artstation" type="text" class="form-control-plaintext" name="social_artstation" value="{{ $settings->social_artstation ?? '-' }}">
                    </div>
                    <div class="form-group">
                        <label for="social_patreon" class="font-weight-bold">Patreon URL</label>
                        <input id="social_patreon" type="text" class="form-control-plaintext" name="social_patreon" value="{{ $settings->social_patreon ?? '-' }}">
                    </div>
                    <div class="form-group">
                        <label for="social_youtube" class="font-weight-bold">YouTube URL</label>
                        <input id="social_youtube" type="text" class="form-control-plaintext" name="social_youtube" value="{{ $settings->social_youtube ?? '-' }}">
                    </div>
                    <div class="form-group">
                        <label for="social_twitch" class="font-weight-bold">Twitch URL</label>
                        <input id="social_twitch" type="text" class="form-control-plaintext" name="social_twitch" value="{{ $settings->social_twitch ?? '-' }}">
                    </div>

                    <div class="form-group mb-0">
                        <a href="{{ route('settings.edit') }}" class="btn btn-primary">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

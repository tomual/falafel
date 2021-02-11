
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <title>
        @yield('title')
        {{ $settings->site_name }}</title>
    <link href="{{ asset('css/artstation.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
</head>

<body class="archive category category-concept-art category-2 hfeed">

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark py-4 px-5">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">{{ $settings->site_name }}</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        @foreach ($tags as $tag)
                        <li class="menu-item"><a href="{{ route('works', ['tag' => $tag->id])}}">{{ $tag->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="container">
        <div class="row">
            <div class="col-lg-12">
                <div id="primary" class="content-area">
                    <main id="main" class="site-main row">
                        @yield('content')

                    </main><!-- #main -->
                </div><!-- #primary -->

            </div>
        </div>
    </main>
    <footer>
        <div class="container d-flex justify-content-between">
            <div>
                @if ($settings->social_instagram)
                <a href="{{ $settings->social_instagram }}"><i class="fab fa-instagram"></i></a>
                @endif
                @if ($settings->social_artstation)
                <a href="{{ $settings->social_artstation }}"><i class="fab fa-artstation"></i></a>
                @endif
                @if ($settings->social_twitter)
                <a href="{{ $settings->social_twitter }}"><i class="fab fa-twitter"></i></a>
                @endif
                @if ($settings->social_twitch)
                <a href="{{ $settings->social_twitch }}"><i class="fab fa-twitch"></i></a>
                @endif
                @if ($settings->social_patreon)
                <a href="{{ $settings->social_patreon }}"><i class="fab fa-patreon"></i></a>
                @endif
                @if ($settings->social_youtube)
                <a href="{{ $settings->social_youtube }}"><i class="fab fa-youtube"></i></a>
                @endif
            </div>
            <div>
            </div>
            <div class="small text-muted">
                © {{ date('Y') }} {{ $settings->site_name }}. All rights reserved.
            </div>

        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" us"=""></script>

</body></html>

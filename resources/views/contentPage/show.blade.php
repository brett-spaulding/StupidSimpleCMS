<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ $contentPage->name }} | {{ config('SSCMS', 'SSCMS') }}</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Icons -->
        <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" />
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('/css/Skeleton-2.0.4/css/normalize.css') }}"/>
        <link rel="stylesheet" href="{{ asset('/css/Skeleton-2.0.4/css/skeleton.css') }}"/>
        <style>

        </style>
        <link rel="stylesheet" href="{{ asset('/css/content.css') }}"/>
    </head>
    <body class="font-sans antialiased">

        <!-- Spacing -->
        <div id="headroom"></div>

        <!-- Navigation -->
        <div id="header" class="container">
            <div class="row">
                <div class="six columns">
                    <h5 id="author-info">
                        @if ( $contentPage->user->avatar)
                            <img src="{{ asset($contentPage->user->avatar) }}" class="avatar"/>
                        @else
                            <img src="/public/img/npc.png" class="rounded-full border-2 border-white mr-4 h-14 w-14 float-start"/>
                        @endif
                        <span class="username">
                            {{ $contentPage->user->name }}
                        </span>
                    </h5>
                </div>
                <div id="header-social-links" class="six columns social-links">
                    @foreach($contentPage->user->socialMediaLinks as $mediaLink)
                        <a href="{{ $mediaLink->url }}" class="social-link u-pull-right" title="{{ $mediaLink->title }}"><i class="{{ $mediaLink->icon }}"></i></a>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Page Title -->
        <div id="title" class="container">
            <div class="row">
                <div class="twelve columns">
                    <h1 style="text-align: center">
                        {{ $contentPage->title }}
                    </h1>
                </div>
            </div>
        </div>

        <!-- Page Content -->
        <div class="container">
            <div class="row" style="padding-top: 36px;">
                <main>
                    {!! $pageContent !!}
                </main>
            </div>
        </div>

        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="twelve columns">
                        <div id="footer-social-links" class="social-links">
                            @foreach($contentPage->user->socialMediaLinks as $mediaLink)
                                <a href="{{ $mediaLink->url }}" class="social-link" title="{{ $mediaLink->title }}"><i class="{{ $mediaLink->icon }}"></i></a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>

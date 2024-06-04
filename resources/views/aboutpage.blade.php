@extends('layouts.app')
@section('OG')
    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@">
    <meta name="twitter:creator" content="@">
    <meta name="twitter:title" content=" Monodeep Samanat - About Me ">
    <meta name="twitter:description"
        content="Learn about Monodeep Samanta, a leading UI/UX designer in London. Discover his passion for creating user-friendly and engaging digital experiences">
    <meta name="twitter:image" content="{{ asset('logo.jpg') }}">

    <!-- Facebook -->

    <meta property="og:url" content="{{ route('homepage') }}">
    <meta property="og:title" content=" Monodeep Samanat - About Me ">
    <meta property="og:description"
        content="Learn about Monodeep Samanta, a leading UI/UX designer in London. Discover his passion for creating user-friendly and engaging digital experiences">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('logo.jpg') }}">
    <meta property="og:image:type" content="image/png">

@endsection

@section('title', 'Dashboard & UX/UI Designer | About Me')
@section('content')
    <x-section-aboutme />
    <div class="mt-5 mb-4 lg:mt-8 lg:mb-0">
        <x-section-chat />
    </div>
    <x-section-portfolio />
    {{-- <div class="py-4 lg:py-14"></div> --}}

@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <style>
        .owl-item {
            overflow: hidden;
        }

        .owl-theme .owl-dots .owl-dot.active span,
        .owl-theme .owl-dots .owl-dot:hover span {
            background-color: #FF003A;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Portfili slider : Only show on mobile
            $('#portfolioSlider').owlCarousel({
                items: 2,
                center: true,
                loop: true,
                margin: 10,
                dots: false
            });
            $('#blogslider').owlCarousel({
                items: 2,
                loop: true,
                margin: 10,
                dots: false
            });
        });
    </script>
@endpush

@extends('layouts.app')
@section('title', 'Dashboard & UX/UI Designer | Home')
@section('content')
    <x-section-portfolio />
    <x-section-chat />
    <x-section-aboutme />
    <x-section-client />
    <x-section-feature />
    <x-section-chat />
    <x-section-service />
    <x-section-video />
    <x-section-testmonial />
    <x-section-blog />
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#clientSlider').owlCarousel({
                items: 3,
                loop: true,
                margin: 10,
                nav: true,
                autoplay: true,
                slideTransition: 'linear',
                // autoplayTimeout: 2000,
                autoplaySpeed: 1000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 3,
                    },
                    768: {
                        items: 5,
                    },
                    1200: {
                        items: 7,
                    },
                }

            });
        });
    </script>
@endpush

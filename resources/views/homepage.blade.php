@extends('layouts.app')
@section('title', 'Dashboard & UX/UI Designer | Home')
@section('content')
    <x-section-portfolio />
    <div class="py-[30px] pt-8">
        <x-section-chat />
    </div>
    <div class="hidden lg:block">
        <x-section-aboutme />
    </div>
    <div class="hidden lg:block">
        <x-section-client />
        <x-section-feature />
        <x-section-chat />
    </div>
    <x-section-service />
    <x-section-video />
    <x-section-testmonial />
    <div class="py-[30px] pb-8">
        <x-section-blog />
    </div>
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
            // Client Slider
            $('#clientSlider').owlCarousel({
                items: 3,
                loop: true,
                margin: 10,
                nav: false,
                autoplay: true,
                slideTransition: 'linear',
                autoplayTimeout: 2000,
                autoplaySpeed: 5000,
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

            // Portfili slider : Only show on mobile
            $('#portfolioSlider').owlCarousel({
                items: 2,
                center: true,
                loop: true,
                margin: 10,
                dots: false
            });
            $('#testmonialSlider').owlCarousel({
                items: 1,
                dots: true,
                loop: true,
                margin: 10,
                dots: true
            });
            $('#serviceslider').owlCarousel({
                items: 2,
                loop: true,
                margin: 10,
                dots:false
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

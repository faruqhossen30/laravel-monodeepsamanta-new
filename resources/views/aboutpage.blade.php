@extends('layouts.app')
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
                dots:false
            });
        });
    </script>
@endpush

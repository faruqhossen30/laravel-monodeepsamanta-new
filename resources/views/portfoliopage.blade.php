@php
    $query = null;
    if (isset($_GET['category'])) {
        $query = trim($_GET['category']);
    }
@endphp
@extends('layouts.app')
@section('title', 'Portfolio | Dashboard & UX/UI Designer | Home')
@section('content')

    <x-portfolio.creativework />
    <section class="hidden lg:block sticky top-[90px] z-30 bg-white">
        <div class="container px-3 py-3 mx-auto my-5 lg:px-0 ">
            <div class="space-x-2 text-gray-500 " data-aos="fade-down" data-aos-duration="1000">
                <a href="{{ route('portfoliopage') }}"
                    class="mb-2 inline-block font-bold border px-6 py-1 rounded  transition @if (!$query) bg-black text-white @endif">All
                    Capabilities</a>
                @foreach ($categories as $cat)
                    <a href="{{ route('portfoliopage', ['category' => $cat->slug]) }}"
                        class="mb-2 inline-block font-bold border px-6 py-1 rounded  transition @if ($cat->slug == $query) bg-black text-white @endif">{{ $cat->name }}</a>
                @endforeach
            </div>

        </div>
    </section>

    <div class="container sticky z-30 block mx-auto bg-white lg:hidden top-20 lg:top-20">
        <div id="categorySlider" class="w-full py-2 mr-4 space-y-2 text-gray-500 owl-carousel owl-theme">
            <a href="{{ route('portfoliopage') }}"
                class="mb-2 inline-block font-bold border px-6 py-1 rounded  transition @if (!$query) bg-black text-white @endif">All
                Capabilities</a>
            @foreach ($categories as $cat)
                <a href="{{ route('portfoliopage', ['category' => $cat->slug]) }}"
                    class="mb-2 inline-block font-bold border px-6 py-1 rounded  transition @if ($cat->slug == $query) bg-black text-white @endif">{{ $cat->name }}</a>
            @endforeach
        </div>
    </div>


    <div class="container px-3 mx-auto lg:px-0">
        <div class="grid grid-cols-12 gap-3 mixingContainer">
            @foreach ($portfolios as $portfolio)
                <x-portfolio.portfolioitem :portfolio="$portfolio" />
            @endforeach
        </div>
        <div class="py-10">
            {{ $portfolios->links('pagination::custom') }}
        </div>
    </div>
    <x-section-chat />
    <x-section-service islink="true" />
    <div class="pb-[0px]"></div>
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
            $('#categorySlider').owlCarousel({
                items: 2,
                loop: true,
                margin: 10,
                dots: false,
                autoWidth: true
            });
        });
    </script>
@endpush

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
    <section class="container mx-auto">

        <div class=" text-gray-500 space-x-2" data-aos="fade-down" data-aos-duration="1000">
            <a href="{{ route('portfoliopage') }}"
                class="mb-2 inline-block font-bold border px-6 py-1 rounded  transition @if (!$query) bg-black text-white @endif">All
                Capabilities</a>
            @foreach ($categories as $cat)
                <a href="{{ route('portfoliopage', ['category' => $cat->slug]) }}"
                    class="mb-2 inline-block font-bold border px-6 py-1 rounded  transition @if ($cat->slug == $query) bg-black text-white @endif">{{ $cat->name }}</a>
            @endforeach
        </div>

    </section>

    <!--Image Gellary Section Start From Here-->
    <div class="container mx-auto">
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
    {{-- <x-section-service /> --}}
    <x-section-service islink="true" />
    <div class="pb-[20px]"></div>
@endsection

@push('style')
@endpush

@push('script')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/cwa_lightbox_bundle_v1.js') }}"></script>
@endpush

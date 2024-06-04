@extends('layouts.app')

@section('SEO')
    <meta name ="title" content="Monodeep Samanta Reviews | Customer Real Feedback ">
    <meta name ="description"
        content="Read reviews about Monodeep Samanta, a creative UI/UX designer in London. See what clients say about his user-friendly and engaging digital designs">
@endsection
@section('OG')
    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@">
    <meta name="twitter:creator" content="@">
    <meta name="twitter:title" content=" Monodeep Samanta Reviews | Customer Real Feedback  ">
    <meta name="twitter:description"
        content="  Read reviews about Monodeep Samanta, a creative UI/UX designer in London. See what clients say about his user-friendly and engaging digital designs">
    <meta name="twitter:image" content="{{ asset('logo.jpg') }}">

    <!-- Facebook -->
    <meta property="og:url" content="{{ route('homepage') }}">
    <meta property="og:title" content=" Monodeep Samanta Reviews | Customer Real Feedback  ">
    <meta property="og:description"
        content="  Read reviews about Monodeep Samanta, a creative UI/UX designer in London. See what clients say about his user-friendly and engaging digital designs">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('logo.jpg') }}">
    <meta property="og:image:type" content="image/png">

@endsection
@section('title', 'Monodeep Samanta Reviews | Customer Real Feedback ')
@section('content')
    <section class="container px-3 pb-0 mx-auto lg:px-0">
        <div class="flex flex-row items-center justify-between py-3 lg:py-10" data-aos="fade-down" data-aos-duration="1000">
            <div class="flex items-center space-x-2">
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                    fill="none">
                    <path
                        d="M17.334 0.833984H2.66732C1.65898 0.833984 0.833984 1.65898 0.833984 2.66732V19.1673L4.50065 15.5007H17.334C18.3423 15.5007 19.1673 14.6757 19.1673 13.6673V2.66732C19.1673 1.65898 18.3423 0.833984 17.334 0.833984ZM17.334 13.6673H3.73982L2.66732 14.7398V2.66732H17.334V13.6673Z"
                        fill="#FF003A"></path>
                    <path
                        d="M10.0013 12.7507L11.4405 9.60648L14.5846 8.16732L11.4405 6.72815L10.0013 3.58398L8.56214 6.72815L5.41797 8.16732L8.56214 9.60648L10.0013 12.7507Z"
                        fill="#FF003A"></path>
                </svg>
                <x-h1>Reviews</x-h1>
            </div>
        </div>
    </section>

    <section class="container px-3 mx-auto lg:px-0">
        @foreach ($reviews as $review)
            <div class="justify-between items-center py-6 first:pt-0 md:flex lg:py-12">
                <div class="flex space-x-3" data-aos="fade-right" data-aos-duration="1000">
                    <div class="flex items-center justify-center w-8 h-8 p-6 rounded-full bg-zinc-200">
                        <span class="font-bold">{{ acronym($review->name) }}</span>
                    </div>
                    <div class="space-y-2">
                        <h3 class="text-lg font-bold">{{ $review->name }}</h3>
                        <div class="flex items-center space-x-2 font-bold">
                            <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>
                            <p>{{ number_format($review->rating, 1) }}</p>
                            <p class="text-gray-500">{{ $review->date->format('d M, Y') }}</p>
                        </div>
                        <div>
                            <p class="text-[18px] leading-[26px] max-w-4xl">{{ $review->review }}</p>
                        </div>

                        <div class="flex items-center py-4 space-x-2">
                            @if ($review->website)
                                <p class="text-sm">Originally Posted on:</p>
                                <a href="{{ $review->website ?? '#' }}" target="_blank"
                                    class=" hover:text-brand flex text-sm leading-[18px] text-primary font-bold items-center space-x-2">
                                    <span>Link</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                    </svg>
                                </a>
                            @endif

                            @if ($review->review_url)
                                <p class="text-sm">Originally Posted on:</p>
                                <a href="{{ $review->review_url ?? '#' }}" target="_blank"
                                    class=" hover:text-brand flex text-sm leading-[18px] text-primary font-bold items-center space-x-2">
                                    <span>{{ $review->type->name ?? '' }}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                    </svg>
                                </a>
                            @endif
                        </div>


                    </div>
                </div>

                <div class="">
                    @if ($review->thumbnail)
                        <div class="flex justify-center">
                            <img src="{{ asset('storage/' . $review->thumbnail) }}" class="lg:max-w-[194px] min-w-[176px]"
                                alt="{{ $review->category->slug ?? '' }}">
                        </div>
                    @endif
                    <div class="flex items-center justify-center py-3 space-x-2 text-center group ">
                        @if ($review->category)
                            <a href="{{ route('portfoliopage', ['category' => $review->category->slug]) }}"
                                class="font-bold text-center text-primary group-hover:text-brand">Similar Works
                            </a>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#FF003A" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" data-slot="icon" class="w-4 h-4 font-bold group-hover:text-brand">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                            </svg>
                        @endif

                    </div>
                </div>
            </div>
            <hr data-aos="fade-up" data-aos-duration="1000">
        @endforeach
        <div class="pt-5">
            {{ $reviews->links('pagination::custom') }}
        </div>
    </section>
    {{-- <div class="lg:py-16"></div> --}}
    <x-section-portfolio islink="true" />
    {{-- <div class="lg:py-6"></div> --}}
    <div>
        <x-section-service islink="true" />
        <div class="flex justify-center pt-5 lg:pt-10" data-aos="fade-up" data-aos-duration="1000">
            <a href="{{ route('servicepage') }}" class="flex items-center space-x-2 font-bold text-primary">
                <span class="text-[15px] leading-[15px] text-brand">See All Services</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="#FF003A" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" data-slot="icon"
                    class="w-4 h-4 font-bold text-[#FF003A] group-hover:text-black">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                </svg>
            </a>
        </div>
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

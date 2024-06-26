@php
    use App\Models\Blog;
    $posts = Blog::where('status', true)->latest()->take(5)->get();
@endphp

@section('title', $post->title)

@section('SEO')
    <meta name ="title" content="{{ $post->meta_title }}">
    <meta name ="description"
        content="{{ $post->meta_description }}">
@endsection
@push('OG')
    @section('OG')
        <!-- Facebook Open Graph -->
        <meta property="og:url" content="{{ route('singleblog', $post->slug) }}" />
        <meta property="og:type" content="Mondeep Samanta" />
        <meta property="og:title" content="{{ $post->title }}" />
        <meta property="og:description" content="{{ $post->project_description }}" />
        <meta property="og:image" content="{{ $post->img_large }}" />
        <!-- Twitter Card -->
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:site" content="@heshelghor" />
        <meta property="og:title" content="{{ $post->title }}" />
        <meta property="og:description" content="{{ $post->project_description }}" />
        <meta property="og:image" content="{{ asset('storage/' . $post->thumbnail) }}" />
    @endsection
@endpush

@extends('layouts.app')
@section('title', '{{$post->meta_title}}')
@section('content')

    <article class="">
        <aside class="container sticky z-40 hidden mx-auto top-36 pt-14 lg:block" data-aos="fade-right"
            data-aos-duration="1000">
            <ul class="space-y-2">
                <li>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('singleblog', $post->slug) }}"
                        class="inline-flex items-center p-4 text-sm font-medium text-center text-white bg-gray-100 rounded-full me-2">
                        <img src="{{ asset('img/icon/facebook-app-symbol.png') }}" class="w-4" alt="">
                    </a>

                </li>
                <li>
                    <a href="https://twitter.com/intent/tweet?url={{ route('singleblog', $post->slug) }}"
                        class="inline-flex items-center p-4 text-sm font-medium text-center text-white bg-gray-100 rounded-full me-2">
                        <svg class="text-black" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                            <path
                                d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334q.002-.211-.006-.422A6.7 6.7 0 0 0 16 3.542a6.7 6.7 0 0 1-1.889.518 3.3 3.3 0 0 0 1.447-1.817 6.5 6.5 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.32 9.32 0 0 1-6.767-3.429 3.29 3.29 0 0 0 1.018 4.382A3.3 3.3 0 0 1 .64 6.575v.045a3.29 3.29 0 0 0 2.632 3.218 3.2 3.2 0 0 1-.865.115 3 3 0 0 1-.614-.057 3.28 3.28 0 0 0 3.067 2.277A6.6 6.6 0 0 1 .78 13.58a6 6 0 0 1-.78-.045A9.34 9.34 0 0 0 5.026 15" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ route('singleblog', $post->slug) }}"
                        class="inline-flex items-center p-4 text-sm font-medium text-center text-white bg-gray-100 rounded-full me-2">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                            <circle cx="4.983" cy="5.009" r="2.188"></circle>
                            <path
                                d="M9.237 8.855v12.139h3.769v-6.003c0-1.584.298-3.118 2.262-3.118 1.937 0 1.961 1.811 1.961 3.218v5.904H21v-6.657c0-3.27-.704-5.783-4.526-5.783-1.835 0-3.065 1.007-3.568 1.96h-.051v-1.66H9.237zm-6.142 0H6.87v12.139H3.095z">
                            </path>
                        </svg>
                    </a>
                </li>
            </ul>
        </aside>
        {{-- bg-[#CFE2F3] --}}
        <div class="lg:-mt-[216px] ">
            <div class="  py-10 w-full pb-60" style="background-color: {{$post->color ?? '#CFE2F3'}}">
                <div class="flex justify-center space-y-3 text-center lg:text-right lg:hidden">
                    <div class="py-2 lg:py-0">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('singleblog', $post->slug) }}"
                            class="inline-flex items-center p-4 text-sm font-medium text-center text-white bg-white rounded-full me-2">
                            <img src="{{ asset('img/icon/facebook-app-symbol.png') }}" class="w-4" alt="">
                        </a>

                        <a href="https://twitter.com/intent/tweet?url={{ route('singleblog', $post->slug) }}"
                            class="inline-flex items-center p-4 text-sm font-medium text-center text-white bg-white rounded-full me-2">
                            <svg class="text-black" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                                <path
                                    d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334q.002-.211-.006-.422A6.7 6.7 0 0 0 16 3.542a6.7 6.7 0 0 1-1.889.518 3.3 3.3 0 0 0 1.447-1.817 6.5 6.5 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.32 9.32 0 0 1-6.767-3.429 3.29 3.29 0 0 0 1.018 4.382A3.3 3.3 0 0 1 .64 6.575v.045a3.29 3.29 0 0 0 2.632 3.218 3.2 3.2 0 0 1-.865.115 3 3 0 0 1-.614-.057 3.28 3.28 0 0 0 3.067 2.277A6.6 6.6 0 0 1 .78 13.58a6 6 0 0 1-.78-.045A9.34 9.34 0 0 0 5.026 15" />
                            </svg>
                        </a>


                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ route('singleblog', $post->slug) }}"
                            class="inline-flex items-center p-4 text-sm font-medium text-center text-white bg-white rounded-full me-2">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                                <circle cx="4.983" cy="5.009" r="2.188"></circle>
                                <path
                                    d="M9.237 8.855v12.139h3.769v-6.003c0-1.584.298-3.118 2.262-3.118 1.937 0 1.961 1.811 1.961 3.218v5.904H21v-6.657c0-3.27-.704-5.783-4.526-5.783-1.835 0-3.065 1.007-3.568 1.96h-.051v-1.66H9.237zm-6.142 0H6.87v12.139H3.095z">
                                </path>
                            </svg>
                        </a>

                    </div>
                </div>

                <div class="mx-auto mt-12">
                    <h1 class=" font-bold text-3xl lg:text-[40px] leading-[48px] text[#0b0c0d] max-w-4xl mx-auto text-center mb-10"
                        data-aos="fade-down" data-aos-duration="1000">
                        {{ $post->title }}</h1>
                    <p class="max-w-xl mx-auto text-center leading-7 text-[#0b0c0d]" data-aos="fade-up"
                        data-aos-duration="1000">{{ $post->short_description }}</p>
                </div>
            </div>
        </div>

        <div class="container mx-auto">
            <div class="w-11/12 max-w-6xl mx-auto -mt-44">
                <img class="w-full rounded-md" src="{{ asset('storage/' . $post->thumbnail) }}" alt="">
            </div>
        </div>

        {{-- start --}}
        <div class="grid w-11/12 max-w-6xl grid-cols-12 px-5 mx-auto my-6 space-y-4 text-sm border rounded-md shadow lg:gap-10 lg:px-10 py-14"
            >
            <div class="col-span-12 lg:col-span-6">
                <h2 class="mb-5 font-semibold uppercase ">About This Project</h2>
                <p class="font-normal text-[16px] leading-[26px]">{{ $post->project_description }}</p>
            </div>
            <div class="col-span-12 md:col-span-6 lg:col-span-3">
                <h2 class="mb-5 font-semibold">SERVICES</h2>
                <ul class="space-y-2">
                    @foreach ($post->categories as $cat)
                        <li><a class="underline" href="#">{{ $cat->name }}</a></li>
                    @endforeach
                    {{-- <li><a class="underline" href="#">Product design</a></li> --}}
                </ul>
            </div>

            <div class="col-span-12 md:col-span-6 lg:col-span-3">
                <h2 class="mb-5 font-semibold uppercase ">Technologies </h2>
                <ul class="space-y-2">
                    @foreach ($post->softwares as $soft)
                        <li>{{ $soft->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        {{-- End --}}
        <div class="w-11/12 max-w-4xl py-10 mx-auto prose ">
            {!! $post->description !!}
        </div>


        <div class="w-11/12 max-w-6xl bg-[#CFE2F3] mx-auto flex flex-col items-center py-10 rounded-lg">
            <svg class="w-20 h-20 text-green-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                fill="currentColor" class="bi bi-quote" viewBox="0 0 16 16">
                <path
                    d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388q0-.527.062-1.054.093-.558.31-.992t.559-.683q.34-.279.868-.279V3q-.868 0-1.52.372a3.3 3.3 0 0 0-1.085.992 4.9 4.9 0 0 0-.62 1.458A7.7 7.7 0 0 0 9 7.558V11a1 1 0 0 0 1 1zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612q0-.527.062-1.054.094-.558.31-.992.217-.434.559-.683.34-.279.868-.279V3q-.868 0-1.52.372a3.3 3.3 0 0 0-1.085.992 4.9 4.9 0 0 0-.62 1.458A7.7 7.7 0 0 0 3 7.558V11a1 1 0 0 0 1 1z" />
            </svg>
            <div class="py-10 ">
                <p class="px-10 text-2xl leading-[42px] font-bold text-center max-w-6xl">
                    I'm Monodeep Samanat, an award-winning senior UX/UI designer based in London. Over my 15-year career
                    journey in UX/UI design, I've navigated through various challenges and triumphs. Now, I'm excited to
                    share my insights and experiences through articles. Join me as I delve into the dynamic world of UX/UI
                    design.
                </p>
            </div>
            <div class="flex flex-col items-center py-10 font-bold">
                <img class="w-20 h-20" src="{{ asset('img/pic.png') }}" alt="">
                <span class="pt-4">Monodeep Samanta</span>
                {{-- <span class="font-normal">Director of Monodeep Samanta</span> --}}
            </div>
        </div>



        </div>

    </article>



    <div class="container mx-auto">
        <div class="py-10 text-center mt-14">
            <h1 class="text-3xl font-bold">
                Related posts
            </h1>
            <p class="py-4 text-lg font-normal text-gray-500">Check out more blogs and stories.</p>
        </div>
        <div id="postSlider"
            class="grid grid-cols-2 px-4 pt-16 lg:px-0 owl-carousel owl-theme sm:grid-cols-2 lg:grid-cols-4 slider">
            @foreach ($posts as $post)
                <a class="overflow-hidden rounded-lg group dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                    href="{{ route('singleblog', $post->slug) }}">
                    <div class="relative pt-[50%] sm:pt-[70%] rounded-lg overflow-hidden">
                        <img class="absolute top-0 object-cover w-full h-full transition-transform duration-500 ease-in-out rounded-lg start-0 group-hover:scale-105"
                            src="{{ asset('storage/' . $post->thumbnail) }}" alt="Image Description">
                    </div>

                    <div class="mt-7">
                        <h3
                            class="font-semibold text-gray-800 text-md lg:text-2xl dark:text-gray-200 group-hover:text-brand">
                            {{ $post->title }}
                        </h3>
                    </div>
                </a>
            @endforeach


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
    <style>
        #postSlider .owl-nav .owl-prev:hover {
            background-color: transparent !important;
            color: #FF003A !important;
        }

        #postSlider .owl-nav .owl-next:hover {
            background-color: transparent !important;
            color: #FF003A !important;
        }
    </style>
    <style type="text/css">
        #postSlider .slider {
            position: relative;
            margin: 0 auto;
        }

        .owl-nav {
            position: absolute;
            top: -5%;
            left: calc(50% - 50px);
            width: 100px;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script>
        $(document).ready(function() {

            const next = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                        </svg>
                        `;
            const prev = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                        </svg>
                        `;

            $('#postSlider').owlCarousel({
                items: 3,
                loop: true,
                margin: 50,
                nav: true,
                dots: false,
                navText: [next, prev],
                responsive: {
                    0: {
                        items: 1,
                    },
                    768: {
                        items: 2,
                    },
                    1200: {
                        items: 3,
                    },
                }

            });
        });
    </script>
@endpush



{{-- @push('style')
    <style>
        #postSlider .owl-nav .owl-prev:hover {
            background-color: transparent !important;
            color: #FF003A !important;
        }

        #postSlider .owl-nav .owl-next:hover {
            background-color: transparent !important;
            color: #FF003A !important;
        }
    </style>
    <style type="text/css">
        #postSlider .slider {
            position: relative;
            margin: 0 auto;
        }

        .owl-nav {
            position: absolute;
            top: -5%;
            left: calc(50% - 50px);
            width: 100px;
        }
    </style>
@endpush

@push('style')
@endpush --}}

@extends('layouts.app')
@section('SEO')
<meta name = "title" content="Monodeep Samanat Services
">
<meta name = "description" content=" Discover the services offered by Monodeep Samanta, a popular UI/UX designer in London. Specializing in creating user-friendly and engaging digital designs tailored to your needs.
">
@endsection
@section('OG')
    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@">
    <meta name="twitter:creator" content="@">
    <meta name="twitter:title" content=" Monodeep Samanat Services  ">
    <meta name="twitter:description"
        content=" Discover the services offered by Monodeep Samanta, a popular UI/UX designer in London. Specializing in creating user-friendly and engaging digital designs tailored to your needs">
    <meta name="twitter:image" content="{{ asset('logo.jpg') }}">

    <!-- Facebook -->
    <meta property="og:url" content="{{ route('homepage') }}">
    <meta property="og:title" content=" Monodeep Samanat Services  ">
    <meta property="og:description"
        content=" Discover the services offered by Monodeep Samanta, a popular UI/UX designer in London. Specializing in creating user-friendly and engaging digital designs tailored to your needs">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('logo.jpg') }}">
    <meta property="og:image:type" content="image/png">

@endsection


@section('title', 'Monodeep Samanat Services ')
@section('content')

    <section class="container mx-auto px-3 lg:px-0 pb-[30px] max-[768px]:pt-3 min-[768px]:py-[30px]">
        <div class="flex flex-row items-center justify-between">
            <x-heading.heading-one>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="18" viewBox="0 0 16 18" fill="none">
                    <path
                        d="M0.666992 4.41667H15.3337V6.25H0.666992V4.41667ZM0.666992 9.91667H15.3337V8.08333H0.666992V9.91667ZM0.666992 13.5833H7.08366V11.75H0.666992V13.5833ZM0.666992 17.25H7.08366V15.4167H0.666992V17.25ZM11.1262 14.6558L9.83366 13.3542L8.54116 14.6467L11.1262 17.25L15.3337 13.0517L14.032 11.75L11.1262 14.6558ZM0.666992 0.75V2.58333H15.3337V0.75H0.666992Z"
                        fill="#FF003A"></path>
                </svg>
                <x-h1>See My Services</x-h1>
            </x-heading.heading-one>

        </div>
    </section>

    <section class="container px-3 mx-auto lg:px-0">
        <div class="grid grid-cols-12 gap-3">
            @foreach ($services as $service)
                <a href="{{ route('singleservice', $service->slug) }}"
                    class="col-span-12 p-3 border group md:col-span-6 lg:col-span-4" data-aos="fade"
                    data-aos-duration="2000">
                    <div class="relative overflow-hidden font-bold text-white rounded-md shadow cursor-pointer">
                        @if ($service->video)
                            <video autoplay loop muted class="w-full h-full">
                                <source src="{{ video_link($service->video) }}" type="video/mp4">
                            </video>
                        @else
                            <img src="{{ asset('storage/' . $service->thumbnail) }}"
                                class="transition duration-500 group-hover:scale-110 group-hover:rotate-3"
                                alt="{{ $service->title }}">
                        @endif

                    </div>
                    <div class="py-2 mt-5 space-y-1">
                        <h3 class="text-2xl font-bold hover:text-brand">{{ $service->title }}</h3>
                        <h2 class="text-lg font-bold text-brand">Starting at ${{ $service->package->starter_price ?? '' }}
                        </h2>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="py-10">
            {{ $services->links('pagination::custom') }}
        </div>
    </section>
    <x-section-chat />
    <x-section-portfolio />
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
        });
    </script>
@endpush

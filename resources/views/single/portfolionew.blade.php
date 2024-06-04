@extends('layouts.app')


@section('SEO')
    <meta name = "description" content="{{ $portfolio->meta_tag }}">
    <meta name = "keywords" content="{{ $portfolio->keyword }}">
@endsection

@section('OG')
    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@">
    <meta name="twitter:creator" content="@">
    <meta name="twitter:title" content="{{ $portfolio->meta_tag }}">
    <meta name="twitter:description" content="{{ $portfolio->meta_description }}">
    <meta name="twitter:image" content="{{ asset('storage/' . $portfolio->thumbnail) }}">

    <!-- Facebook -->

    <meta property="og:url" content="{{ route('homepage') }}">
    <meta property="og:title" content="{{ $portfolio->meta_tag }}">
    <meta property="og:description" content="{{ $portfolio->meta_description }}">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('storage/' . $portfolio->thumbnail) }}">
    <meta property="og:image:type" content="image/png">

@endsection
@section('title', "Dashboard & UX/UI Designer | {$portfolio->title}")
@section('content')
    <section class="container mx-auto px-3 lg:px-0 pb-[30px] max-[768px]:pt-3 min-[768px]:py-[30px]">
        <div class="flex flex-row items-center justify-between">
            <x-heading.heading-one>
                <x-h1>{{ $portfolio->title }}</x-h1>
            </x-heading.heading-one>
        </div>
    </section>

    <section class="container mx-auto px-3 lg:px-0 lg:mb-24">
        @foreach ($portfolio->sections as $section)
            @if ($section->thumbnail)
                <div>
                    <img src="{{ asset('storage/' . $section->thumbnail) }}"
                        class="w-full @if ($section->content) rounded-2xl @endif" alt="thumbnail">
                </div>
            @endif

            @if ($section->iframe)
                <div>
                    {!! $section->iframe !!}
                </div>
            @endif


            @if ($section->content)
                <div class="w-full md:w-10/12 lg:w-8/12 mx-auto py-10 lg:py-16 space-y-8 prose">
                    {!! $section->content !!}
                </div>
            @endif


            <div class="prose">

            </div>
        @endforeach

        {{-- <div class="my-6">
            @foreach ($portfolio->images as $image)
                @if ($image->video)
                    @if ($image->caption)
                        <div class="py-2">
                            <h2 class="py-2 text-lg shadow-md">{{ $image->caption }}</h2>
                        </div>
                    @endif
                    <video autoplay loop muted class="w-full h-full">
                        <source src="{{ asset('uploads/portfolio/video/' . $image->video) }}" type="video/mp4">
                    </video>
                @else
                    @if ($image->caption)
                        <div class="py-2">
                            <h2 class="py-2 text-lg shadow-md">{{ $image->caption }}</h2>
                        </div>
                    @endif
                    <img src="{{ asset('uploads/galleries/' . $image->image) }}" class="w-full h-auto" alt="">
                @endif
            @endforeach --}}
        </div>
    </section>

    <section class="hidden lg:block container mx-auto px-3 lg:px-0">
        <div class="flex justify-between items-center space-y-8 md:space-y-0 py-2">
            <div class="">
                @if (isset($portfolio->previous))
                    <p class="text-sm text-gray-400 font-bold mb-1">PREVIOUS PROJECT</p>
                    <a href="{{ route('singleportfolio', $portfolio->previous->slug) }}"
                        class="text-[24px] leading-[24px] font-extrabold hover:text-brand">{{ $portfolio->previous->title }}</a>
                @endif
            </div>

            <div class="">
                @if (isset($portfolio->next))
                    <p class="text-sm text-gray-400 font-bold mb-1">NEXT PROJECT</p>
                    <a href="{{ route('singleportfolio', $portfolio->next->slug) }}"
                        class="text-[24px] leading-[24px] font-extrabold hover:text-brand">{{ $portfolio->next->title }}</a>
                @endif
            </div>

        </div>
    </section>

    {{-- For Mobile version --}}

    <section class="lg:hidden container mx-auto px-3 lg:px-0">
        <div class="flex justify-between items-center">
            <div class="">
                @if (isset($portfolio->previous))
                    <div class="flex">
                        <!-- Previous Button -->
                        <a href="{{ route('singleportfolio', $portfolio->previous->slug) }}"
                            class="flex items-center justify-center px-3 h-8 me-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-brand dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <svg class="w-3.5 h-3.5 me-2 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 5H1m0 0 4 4M1 5l4-4" />
                            </svg>
                            Previous
                        </a>
                    </div>
                @endif
            </div>

            <div class="">
                @if (isset($portfolio->next))
                    <a href="{{ route('singleportfolio', $portfolio->next->slug) }}"
                        class="flex items-center justify-center px-3 h-8 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-brand dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        Next
                        <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                @endif
            </div>

        </div>
    </section>



    <div class="mb-20 mt-5">
        <x-section-chat />
    </div>
    {{-- <div class="max-w-[1260px] h-full rounded-md mx-auto pl-20 py-10 my-2 space-y-2 text-white text-start bg-[#F87242] mb-24"
        style="background-image: url('{{ asset('img/action-bg-1.webp') }}')">
        <h5 class="font-black text-[40px] leading-[50px] tracking-tight mt-2">HAVE A PROJECT</h5>
        <h5 class="text-[24px] leading-[28px] font-black">THAT NEEDS SOME SOME</h5>
        <a href="{{ route('contactpage') }}"
            class="bg-white py-2 px-6 inline-flex items-center gap-x-2 text-lg rounded-md text-black font-bold  shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 hover:text-[#FF003A]">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-wechat" viewBox="0 0 16 16">
                <path
                    d="M11.176 14.429c-2.665 0-4.826-1.8-4.826-4.018 0-2.22 2.159-4.02 4.824-4.02S16 8.191 16 10.411c0 1.21-.65 2.301-1.666 3.036a.324.324 0 0 0-.12.366l.218.81a.616.616 0 0 1 .029.117.166.166 0 0 1-.162.162.177.177 0 0 1-.092-.03l-1.057-.61a.519.519 0 0 0-.256-.074.509.509 0 0 0-.142.021 5.668 5.668 0 0 1-1.576.22ZM9.064 9.542a.647.647 0 1 0 .557-1 .645.645 0 0 0-.646.647.615.615 0 0 0 .09.353Zm3.232.001a.646.646 0 1 0 .546-1 .645.645 0 0 0-.644.644.627.627 0 0 0 .098.356" />
                <path
                    d="M0 6.826c0 1.455.781 2.765 2.001 3.656a.385.385 0 0 1 .143.439l-.161.6-.1.373a.499.499 0 0 0-.032.14.192.192 0 0 0 .193.193c.039 0 .077-.01.111-.029l1.268-.733a.622.622 0 0 1 .308-.088c.058 0 .116.009.171.025a6.83 6.83 0 0 0 1.625.26 4.45 4.45 0 0 1-.177-1.251c0-2.936 2.785-5.02 5.824-5.02.05 0 .1 0 .15.002C10.587 3.429 8.392 2 5.796 2 2.596 2 0 4.16 0 6.826m4.632-1.555a.77.77 0 1 1-1.54 0 .77.77 0 0 1 1.54 0m3.875 0a.77.77 0 1 1-1.54 0 .77.77 0 0 1 1.54 0" />
            </svg>
            Let's Chat
        </a>
    </div> --}}


@endsection

@push('style')
@endpush

@push('script')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/mixitup.min.js') }}"></script>
    <script>
        var mixer = mixitup('.mixingContainer');
    </script>
@endpush

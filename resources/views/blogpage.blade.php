@extends('layouts.app')
@section('title', 'Dashboard & UX/UI Designer | Blogs')
@section('content')
    <section class="container mx-auto px-3 lg:px-0">
        <div class="grid grid-cols-12 py-20 space-y-8 lg:space-y-0">
            <!--FEATURED WORK section start from here-->
            <div class="col-span-12 lg:col-span-7 gap-10 space-y-4">
                <div class="pb-5">
                    <x-h1>
                        <svg class="w-5 h-5 inline" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                            viewBox="0 0 20 20" fill="none">
                            <path
                                d="M17.334 0.833984H2.66732C1.65898 0.833984 0.833984 1.65898 0.833984 2.66732V19.1673L4.50065 15.5007H17.334C18.3423 15.5007 19.1673 14.6757 19.1673 13.6673V2.66732C19.1673 1.65898 18.3423 0.833984 17.334 0.833984ZM17.334 13.6673H3.73982L2.66732 14.7398V2.66732H17.334V13.6673Z"
                                fill="#FF003A"></path>
                            <path
                                d="M10.0013 12.7507L11.4405 9.60648L14.5846 8.16732L11.4405 6.72815L10.0013 3.58398L8.56214 6.72815L5.41797 8.16732L8.56214 9.60648L10.0013 12.7507Z"
                                fill="#FF003A"></path>
                        </svg>
                        Design Matters
                    </x-h1>
                </div>
                <p class="text-lg">I am sharing practical tips and real-world experiences to help both budding and seasoned
                    designers level up their skills. Dive into the latest trends, discover the best tools, and explore the
                    art
                    of creating user-friendly designs.</p>
                <p class="text-lg">My articles are your go-to source for simplified design wisdom. Let’s grow together in
                    this
                    vibrant UI/UX design blog community.</p>
            </div>
            <!--FEATURED WORK section End from here-->
            <div class="col-span-12 lg:col-span-5">
                <div style="position:relative;padding-top:56.25%;"><iframe
                        src="https://iframe.mediadelivery.net/embed/223687/f270e63c-dbb6-46ce-8936-4e407cd9bffa?autoplay=true&loop=true&muted=true&preload=false&responsive=true"
                        loading="lazy" style="border:0;position:absolute;top:0;height:100%;width:100%;"
                        allow="accelerometer;gyroscope;autoplay;encrypted-media;picture-in-picture;"
                        allowfullscreen="true"></iframe></div>
            </div>
        </div>

    </section>



    <section class="container mx-auto px-3 lg:px-0">
        <div class="flex items-center space-x-2 py-2 px-4">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                fill="none">
                <path
                    d="M17.334 0.833984H2.66732C1.65898 0.833984 0.833984 1.65898 0.833984 2.66732V19.1673L4.50065 15.5007H17.334C18.3423 15.5007 19.1673 14.6757 19.1673 13.6673V2.66732C19.1673 1.65898 18.3423 0.833984 17.334 0.833984ZM17.334 13.6673H3.73982L2.66732 14.7398V2.66732H17.334V13.6673Z"
                    fill="#FF003A"></path>
                <path
                    d="M10.0013 12.7507L11.4405 9.60648L14.5846 8.16732L11.4405 6.72815L10.0013 3.58398L8.56214 6.72815L5.41797 8.16732L8.56214 9.60648L10.0013 12.7507Z"
                    fill="#FF003A"></path>
            </svg>
            <h3 class="text-2xl font-extrabold">Latest article</h3>

        </div>
        <div>
            <div class="p-4 grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($posts as $post)
                    <a href="{{ route('singleblog', $post->slug) }}"
                        class="group rounded-lg overflow-hidden dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                        <div class="relative pt-[50%] sm:pt-[70%] rounded-lg overflow-hidden">
                            <img class="w-full h-full absolute top-0 start-0 object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out rounded-lg"
                                src="{{ asset('uploads/galleries/' . $post->thumbnail) }}" alt="{{ $post->title }}">

                        </div>

                        <div class="mt-7">
                            <h3 class="text-xl font-semibold text-gray-800 group-hover:text-gray-600 dark:text-gray-200">
                                {{ $post->title }}
                            </h3>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="py-10">
                {{ $posts->links('pagination::custom') }}
            </div>
        </div>
    </section>


    <div class="py-5 lg:py-10">
        <x-section-chat />

    </div>
    {{-- <div class="pb-[50px]"></div> --}}
@endsection

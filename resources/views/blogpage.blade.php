@extends('layouts.app')
@section('title', 'Dashboard & UX/UI Designer | Blogs')
@section('content')


    <section class="container mx-auto">
        <div class="lg:p-0 md:flex justify-between lg:mt-16  md:space-x-10" id="lightgallery">
            <div class="md:w-7/12 space-y-4 mb-7 ">
                <h2 class="text-2xl font-bold lg:py-8">

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
                </h2>
                <p class="text-lg">I am sharing practical tips and real-world experiences to help both budding and seasoned
                    designers level up their skills. Dive into the latest trends, discover the best tools, and explore the
                    art
                    of creating user-friendly designs.</p>
                <p class="text-lg">My articles are your go-to source for simplified design wisdom. Let’s grow together in
                    this
                    vibrant UI/UX design blog community.</p>
            </div>
            <!--FEATURED WORK section End from here-->
            <a href="{{ asset('img/Portfullio/Monodeep-Samanata-UIUX-Designer.webp') }}"
                class="cwa-lightbox-image  w-full md:w-5/12 relative h-full overflow-hidden  cursor-pointer rounded-md mx-auto">

                <img class="w-full h-auto" src="{{ asset('img/Portfullio/Monodeep-Samanata-UIUX-Designer.webp') }}"
                    alt="" loading="lazy">
            </a>
        </div>
    </section>



<section class="container mx-auto">
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
                            src="{{ asset('uploads/blog/' . $post->thumbnail) }}" alt="{{ $post->title }}">

                    </div>

                    <div class="mt-7">
                        <h3 class="text-xl font-semibold text-gray-800 group-hover:text-gray-600 dark:text-gray-200">
                            {{ $post->title }}
                        </h3>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>


    <div class="py-5 lg:py-10">
        <x-section-chat />

    </div>
    {{-- <div class="pb-[50px]"></div> --}}
@endsection

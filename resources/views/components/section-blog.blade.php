@php
    use App\Models\Blog;
    $posts = Blog::latest()
        ->take(3)
        ->get();

@endphp

<div class="flex items-center justify-between py-3 lg:pt-[60px] lg:pb-8">
    <div class="flex items-center py-2 space-x-2" data-aos="fade-right" data-aos-duration="1000">
        <x-icon.clients />

        <h2 class="text-lg lg:text-[26px] font-bold">Daily Blogs</h2>
    </div>
    <a href="{{ route('blogpage') }}" class="flex items-center space-x-2 font-bold text-primary" data-aos="fade-left" data-aos-duration="1000">
        <span class="text-[15px] leading-[15px]">See All Blogs</span>
        <svg xmlns="http://www.w3.org/2000/svg" fill="#FF003A" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            data-slot="icon" class="w-4 h-4 font-bold">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
        </svg>
    </a>
</div>


{{-- <div class="flex flex-row justify-between items-center py-3 lg:pt-[60px] lg:pb-8">
    <div class="flex items-center space-x-2">
        <x-icon.clients />
        <h2 class="text-lg lg:text-[26px] font-bold">Daily Blogs</h2>
    </div>
    @isset($islink)
        <a href="{{ route('blogpage') }}" class="flex items-center space-x-2 font-bold text-brand">
            <span class="text-[15px] leading-[15px]">See All Blogs</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="#FF003A" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                data-slot="icon" class="w-4 h-4 font-bold">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
            </svg>
        </a>
    @endisset
</div> --}}




{{-- Blog Slider start --}}
<div class="block md:hidden">
    <div id="blogslider" class="grid grid-cols-2 gap-2 owl-carousel owl-theme sm:grid-cols-2 lg:grid-cols-4">
        @foreach ($posts as $post)
            <a class="overflow-hidden rounded-lg group dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-aos="fade" data-aos-duration="2000"
                href="{{route('singleblog', $post->slug)}}">
                <div class="relative pt-[50%] sm:pt-[70%] rounded-lg overflow-hidden">
                    <img class="absolute top-0 object-cover w-full h-full transition-transform duration-500 ease-in-out rounded-lg start-0 group-hover:scale-105"
                        src="{{ asset('uploads/post/' . $post->thumbnail) }}" alt="Image Description">
                </div>

                <div class="mt-7">
                    <h3 class="font-semibold text-gray-800 text-md lg:text-2xl dark:text-gray-200">
                        {{ $post->title }}
                    </h3>
                </div>
            </a>
        @endforeach


    </div>
</div>
{{-- Blog Slider end --}}
    <div class="hidden gap-6 lg:grid sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($posts as $post)
            <a class="overflow-hidden rounded-lg group dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-aos="fade" data-aos-duration="2000"
                href="{{route('singleblog', $post->slug)}}">
                <div class="relative pt-[50%] sm:pt-[70%] rounded-lg overflow-hidden">
                    <img class="absolute top-0 object-cover w-full h-full transition-transform duration-500 ease-in-out rounded-lg start-0 group-hover:scale-105"
                        src="{{ asset('uploads/post/' . $post->thumbnail) }}" alt="{{$post->title}}">
                </div>

                <div class="mt-7">
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 hover:text-[#FF003A]">
                        {{ $post->title }}
                    </h3>
                </div>
            </a>
        @endforeach
    </div>

{{-- <div class="h-8 lg:h-24"></div> --}}

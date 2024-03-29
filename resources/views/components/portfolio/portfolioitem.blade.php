<a href="{{ route('singleportfolio', $portfolio->slug) }}" data-aos="zoom-in" data-aos-duration="1000"
    class="group col-span-12 sm:col-span-6 lg:col-span-4 font-bold relative overflow-hidden text-white rounded-sm shadow cursor-pointer mix">
    <!--layer start-->
    <div class="absolute top-0 left-0 z-10 hidden w-full h-full transition bg-black opacity-50 group-hover:block">
    </div>
    <!--layer end-->
    @if ($portfolio->video)
        <video autoplay loop muted class="w-full h-full">
            <source src="{{video_link($portfolio->video)}}" type="video/mp4">
        </video>
    @else
        <img class="object-cover w-full h-full transition duration-500 max-h-80 group-hover:scale-110 group-hover:rotate-3"
            src="{{ asset('uploads/galleries/' . $portfolio->thumbnail) }}" alt="">
    @endif


    <div class="absolute bottom-0 z-10 hidden space-y-2 group-hover:bottom-6 group-hover:left-6 group-hover:block">
        <h1 class="text-2xl">{{ $portfolio->title }}</h1>
        <span class="hover:text-[#FF003A] transition flex items-center space-x-2">
            <span>See All</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="#FF003A" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" data-slot="icon" class="w-4 h-4 font-bold">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
            </svg>
        </span>
    </div>
</a>

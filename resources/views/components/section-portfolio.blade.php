@php
    use App\Models\Category;
    $categories = Category::get();
@endphp
<section class="container mx-auto py-[30px]">
    <div class="flex flex-row items-center justify-between">
        <x-heading.heading-one>
            <x-icon.photo />
            <x-h1>Check Out My Portfolio</x-h1>
        </x-heading.heading-one>
        <x-arrow-link route="portfoliopage">
            See All Portfolios
        </x-arrow-link>
    </div>
</section>
<section class="container mx-auto">
    <div class="grid-cols-2 gap-2 md:grid sm:grid-cols-2 lg:grid-cols-4">
        @foreach ($categories as $category)
            <!--Image Card Start-->
            <a href="{{ route('portfoliopage', ['category' => $category->slug]) }}"
                class="relative overflow-hidden font-bold text-white rounded-md shadow cursor-pointer group">
                <!--layer start-->
                <div
                    class="absolute top-0 left-0 z-10 hidden w-full h-full transition bg-gradient-to-t from-gray-800 opacity-70 group-hover:block">
                </div>
                <!--layer end-->
                <img class="object-top w-full transition duration-500 max-h-96 group-hover:scale-110 group-hover:rotate-3"
                    src="{{ asset('uploads/galleries/' . $category->thumbnail) }}" alt="">
                <div
                    class="absolute bottom-0 z-20 hidden space-y-2 group-hover:bottom-6 group-hover:left-6 group-hover:block">
                    <h1 class="text-2xl">{{ $category->name }}</h1>
                    <span class="hover:text-[#FF003A] transition flex items-center space-x-2">
                        <span>See All</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#FF003A" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" data-slot="icon" class="w-4 h-4 font-bold">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
                    </span>
                </div>
            </a>
            <!--Image Card end-->
        @endforeach
    </div>
</section>

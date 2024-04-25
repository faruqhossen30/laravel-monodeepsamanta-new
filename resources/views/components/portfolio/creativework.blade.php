<section class="container mx-auto px-3 lg:px-0">
    <div class="grid grid-cols-12 lg:py-10 lg:gap-10">
        <!--FEATURED WORK section start from here-->
        <div class="col-span-12 lg:col-span-7 space-y-4" >
            <div class="lg:pb-5 pt-4 lg:pt-0"><x-h1>Creativity by Monodeep Samanta</x-h1></div>
            <p class="hidden text-lg lg:block text-justify">Explore a Gallery of Creativity by Monodeep Samanta: Unveil a collection of exquisite UI/UX
                design Portfolios. Immerse in a journey of innovation, aesthetics, and User-centric excellence. Discover the
                power of design That inspires, engages, and transforms digital experiences. People love my designs because
                they are easy to use with satisfying layouts. Let’s make your website amazing. Contact me today, and have a
                flying start!</p>
            <div class="hidden lg:block">
                <x-arrow-link route="servicepage">
                    See All Services
                </x-arrow-link>
            </div>
        </div>
        <div class="col-span-12 lg:col-span-5 py-2 lg:py-0">
            @if (option('portfolio_video'))

            @endif
            <video autoplay loop muted controls class="w-full h-full transition duration-1000 group-hover:scale-110 group-hover:rotate-3">
                <source src="https://vz-042d75cc-e8d.b-cdn.net/{{option('portfolio_video')}}/play_720p.mp4" type="video/mp4">
            </video>
        </div>
    </div>

</section>

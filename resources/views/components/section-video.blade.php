<section class="container mx-auto px-3 lg:px-0 py-[30px]">
    <div class="flex flex-row items-center justify-between">
        <x-heading.heading-one>
            <x-icon.clients />
            <x-h1>Client Opinions</x-h1>
        </x-heading.heading-one>
        <x-arrow-link route="reviewpage">
            See All Testmonials
        </x-arrow-link>
    </div>
</section>

<section class="container mx-auto px-3 lg:px-0">
    <video controls class="w-full" data-aos="zoom-in" data-aos-duration="1000">
        <source src="{{ asset('testimonial-video.mp4') }}" type="video/mp4">
    </video>
</section>

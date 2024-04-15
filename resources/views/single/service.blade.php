@extends('layouts.app')
@section('title', "{$service->title} | Dashboard & UX/UI Designer")
@section('content')

    <section class="container mx-auto px-3 lg:px-0">
        <div class="grid grid-cols-12 gap-0 lg:gap-10 pt-3">
            <div class="col-span-12 lg:col-span-8">
                <x-heading.heading-one>
                    <x-h1>{{ $service->title }}</x-h1>
                </x-heading.heading-one>

                {{-- Slider Start --}}
                @if ($service->sliders->count())
                    <div class="pt-4 ">
                        <div id="singleServiceCarousel" class="owl-carousel owl-theme slider bg-gray-100 mx-5 w-cal30 lg:w-cal40">
                            @foreach ($service->sliders as $key => $slider)
                                <div class="item mx-auto" data-hash="{{ $key }}" style="width: calc(100% - 50px)">
                                    @if ($slider->video)
                                        {!! $slider->video !!}
                                    @else
                                        <a href="{{ asset('uploads/galleries/' . $slider->thumbnail) }}"
                                            class="cwa-lightbox-image" data-desc="{{ $service->title }}">
                                            <img src="{{ asset('uploads/galleries/' . $slider->thumbnail) }}"
                                                class="" alt="">
                                        </a>
                                    @endif

                                </div>
                            @endforeach
                        </div>
                        <div class="flex space-x-2 py-2">
                            @foreach ($service->sliders as $key => $slider)
                                <a href="#{{ $key }}" class="" data-slider="{{ $key }}">
                                    @if ($slider->video)
                                        <img src="{{asset('img/media-player.png')}}" alt=""
                                            class="w-32 custompacity sliderlinkimage{{ $key }}">
                                    @else
                                        <img src="{{ asset('uploads/galleries/' . $slider->thumbnail) }}" alt=""
                                            class="w-32 custompacity sliderlinkimage{{ $key }}">
                                    @endif

                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
                {{-- Package Tab Only for mobile --}}
                <span class="block lg:hidden">
                    <x-service.mobilepackagetab :service="$service" />
                </span>
                {{-- Slider Start --}}
                <div class="py-8 prose max-w-none">
                    {!! $service->description !!}
                </div>

                <div class="grid grid-cols-2 py-4">
                    <div class="col-span-2 lg:col-span-1">
                        <h3 class="py-2 font-bold text-[20px] leading-['26px']">What’s Included</h3>
                        <p>Minimalist, Brandmark, Monogram</p>
                    </div>
                    <div class="col-span-2 lg:col-span-1">
                        <h3 class="py-2 font-bold text-[20px] leading-['26px']">File Format</h3>
                        <p>AI, EPS, JPG, PDF, PNG, PSD, SVG </p>
                    </div>
                </div>
                <div class="hidden md:block">
                    <h3 class="py-2 font-bold text-[20px] leading-['26px']">What’s Included</h3>
                    <div class="flex flex-col">
                        <div class="-m-1.5 overflow-x-auto">
                            <div class="p-1.5 min-w-full inline-block align-middle">
                                <div class="border border-gray-100 overflow-hidden dark:border-gray-700 rounded-2xl">
                                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                        <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                                            @if ($service->package)
                                                <tr
                                                    class="divide-x divide-gray-100 odd:bg-white  even:bg-gray-50 dark:odd:bg-slate-900 dark:even:bg-slate-800">
                                                    <td
                                                        class="px-6 py-6 whitespace-nowrap text-gray-800 dark:text-gray-200 text-start text-[18px] leading-[16px]">
                                                        Services Tiers</td>
                                                    <td
                                                        class="px-6 py-6 whitespace-nowrap text-[18px] leading-[16px] text-gray-800 dark:text-gray-200 text-center">
                                                        Starter <p class="py-2">
                                                            ${{ optional($service->package)->starter_price }}</p>
                                                    </td>
                                                    <td
                                                        class="px-6 py-6 whitespace-nowrap text-[18px] leading-[16px] text-gray-800 dark:text-gray-200 text-center">
                                                        Standard <br>
                                                        <p class="py-2">
                                                            ${{ optional($service->package)->standard_price }}
                                                        </p>
                                                    </td>
                                                    <td
                                                        class="px-6 py-6 whitespace-nowrap text-[18px] leading-[16px] text-gray-800 dark:text-gray-200 text-center">
                                                        Advanced <br>
                                                        <p class="py-2">${{ optional($service->package)->advance_price }}
                                                        </p>
                                                    </td>
                                                </tr>
                                            @endif

                                            @foreach ($service->features as $feature)
                                                <tr
                                                    class="divide-x divide-gray-100 odd:bg-white even:bg-gray-50 dark:odd:bg-slate-900 dark:even:bg-slate-800">
                                                    <td
                                                        class="px-6 py-5 whitespace-nowrap text-[16px] leading-[19px] text-gray-800 dark:text-gray-200 text-start">
                                                        {{ $feature->feature }}</td>
                                                    <td
                                                        class="text-[18px] leading-[16px] px-6 py-5 whitespace-nowrap text-gray-800 dark:text-gray-200 text-center">
                                                        {{ $feature->starter }}</td>
                                                    <td
                                                        class="text-[18px] leading-[16px] px-6 py-5 whitespace-nowrap text-gray-800 dark:text-gray-200 text-center">
                                                        {{ $feature->standard }}</td>
                                                    <td
                                                        class="text-[18px] leading-[16px] px-6 py-5 whitespace-nowrap  dark:text-gray-200 text-center">
                                                        {{ $feature->advanced }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border my-8 p-2 rounded-2xl lg:flex items-center">
                    <div class="grow">
                        <img class="w-80 max-w-lg" src="{{ asset('img/man-working-from-home.webp') }}" alt="">
                    </div>
                    <div class="grow space-y-5">
                        <h3 class="text-[20px] leading-[26px] font-bold">Customized this project</h3>
                        <p class="text-[18px] leading-[26px]">I offer you my best service in illustration. I take your
                            ideas and bring them to a next level.I will help you to make..</p>
                        <button type="button"
                            class="py-2 px-8 inline-flex items-center gap-x-2 text-md rounded-md font-normal border-black bg-black hover:bg-[#FF003A] text-white hover:text-white disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                            Send Request
                        </button>
                    </div>
                </div>

                <div class="hidden lg:block hs-accordion-group">
                    @foreach ($service->faqs as $faq)
                        <div class="hs-accordion" id="hs-basic-with-title-and-arrow-stretched-heading{{ $faq->id }}">
                            <button
                                class="hs-accordion-toggle hs-accordion-active:text-blue-600 py-3 inline-flex items-center justify-between gap-x-3 w-full font-semibold text-start text-gray-800 hover:text-gray-500 rounded-lg disabled:opacity-50 disabled:pointer-events-none dark:hs-accordion-active:text-blue-500 dark:text-gray-200 dark:hover:text-gray-400 dark:focus:outline-none dark:focus:text-gray-400"
                                aria-controls="hs-basic-with-title-and-arrow-stretched-collapse{{ $faq->id }}">
                                {{ $faq->question }}
                                <svg class="hs-accordion-active:hidden block w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m6 9 6 6 6-6" />
                                </svg>
                                <svg class="hs-accordion-active:block hidden w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m18 15-6-6-6 6" />
                                </svg>
                            </button>
                            <div id="hs-basic-with-title-and-arrow-stretched-collapse{{ $faq->id }}"
                                class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                                aria-labelledby="hs-basic-with-title-and-arrow-stretched-heading{{ $faq->id }}">
                                <p>{{ $faq->answer }}</p>
                            </div>
                        </div>
                    @endforeach

                </div>
                {{-- For Mobile --}}
                <div class="hidden lg:block border my-8 p-10 rounded-2xl ">
                    <h3 class="p-4 font-bold text-[26px] leading-['32px']">Frequently Asked Questions </h3>
                    <div class="flex space-x-4 py-8">
                        <div class="flex justify-center items-center p-8 bg-lime-600 w-8 h-8 rounded-full">
                            <span class="font-bold text-lg text-white">1</span>
                        </div>
                        <div class="space-y-4">
                            <p>After purchasing the project, send requirements so monodeep can start the project. Delivery
                                time
                                starts when Writi receives requirements from you.</p>
                            <a href="#"
                                class="flex text-sm leading-[18px] text-primary font-bold items-center space-x-2">
                                <span>View Requirements</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="flex space-x-4 py-8">
                        <div class="flex justify-center items-center p-8 bg-lime-600 w-8 h-8 rounded-full">
                            <span class="font-bold text-lg text-white">2</span>
                        </div>
                        <div class="space-y-4">
                            <p>Writi works on your project following the steps below. Revisions may occur after the delivery
                                date.</p>
                            <div class="border rounded-2xl p-6 m-14">
                                <ul class="space-y-10 py-4 text-sm">
                                    <li class="flex space-x-3">
                                        <svg class="flex-shrink-0 h-6 w-6 mt-0.5 text-teal-500"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="20 6 9 17 4 12" />
                                        </svg>
                                        <span class="text-gray-600 dark:text-white">
                                            <p>
                                                Initial Questions <br>
                                                I will ask you few initial questions at the time of starting the project.
                                                That
                                                would help me understand the company / product and it is crucial before
                                                starting
                                                a design process
                                            </p>
                                        </span>
                                    </li>
                                    <li class="flex space-x-3">
                                        <svg class="flex-shrink-0 h-6 w-6 mt-0.5 text-teal-500"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="20 6 9 17 4 12" />
                                        </svg>
                                        <span class="text-gray-600 dark:text-white">
                                            <p>
                                                Initial Questions <br>
                                                I will ask you few initial questions at the time of starting the project.
                                                That
                                                would help me understand the company / product and it is crucial before
                                                starting
                                                a design process
                                            </p>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="flex space-x-4 py-8">
                        <div class="flex justify-center items-center p-8 bg-lime-600 w-8 h-8 rounded-full">
                            <span class="font-bold text-lg text-white">3</span>
                        </div>
                        <div class="space-y-4">
                            <p>Writi works on your project following the steps below. Revisions may occur after the delivery
                                date.</p>
                            <a href="#"
                                class="flex text-sm leading-[18px] text-primary font-bold items-center space-x-2">
                                <span>What If I'm Not Happy With The Work?</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                </svg>


                            </a>
                        </div>
                    </div>
                </div>

                <x-section-video />
                <div class="hidden lg:block">
                    <section>
                        <h1 class="flex items-center text-2xl space-x-2 py-4 my-8 font-bold">
                            <svg class="" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                viewBox="0 0 20 20" fill="none">
                                <path
                                    d="M17.334 0.833984H2.66732C1.65898 0.833984 0.833984 1.65898 0.833984 2.66732V19.1673L4.50065 15.5007H17.334C18.3423 15.5007 19.1673 14.6757 19.1673 13.6673V2.66732C19.1673 1.65898 18.3423 0.833984 17.334 0.833984ZM17.334 13.6673H3.73982L2.66732 14.7398V2.66732H17.334V13.6673Z"
                                    fill="#FF003A"></path>
                                <path
                                    d="M10.0013 12.7507L11.4405 9.60648L14.5846 8.16732L11.4405 6.72815L10.0013 3.58398L8.56214 6.72815L5.41797 8.16732L8.56214 9.60648L10.0013 12.7507Z"
                                    fill="#FF003A"></path>
                            </svg>
                            <span>Reviews</span>
                        </h1>
                    </section>
                    {{-- Hidden For Mobile --}}
                    @include('inc.servicepage.reviewsection')
                </div>
            </div>
            {{-- Package Tab --}}

            <x-service.packagetab :service="$service" />

        </div>
    </section>
    <x-section-portfolio />
    <div class="py-6"></div>
    <div>
        <x-section-service />
        <div class="flex justify-center py-5 lg:py-20">
            <a href="{{ route('servicepage') }}" class="text-primary font-bold flex items-center space-x-2 hover:text-brand">
                <span class="text-[15px] leading-[15px]">See All Services</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="#FF003A" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" data-slot="icon" class="w-4 h-4 font-bold">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                </svg>
            </a>
        </div>
    </div>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <style type="text/css">
        .slider {
            position: relative;
            margin: 0 auto;
        }

        .owl-nav .owl-next {
            position: absolute;
            top: calc(50% - 20px);
            right: 0;
            margin-right: -20px !important;
            width: 40px;
            height: 40px;
            opacity: .8;
            border-radius: 50% !important;
            background-color: white !important;
            color: gray !important;
            --tw-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --tw-shadow-colored: 0 4px 6px -1px var(--tw-shadow-color), 0 2px 4px -2px var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
        }

        .owl-nav .owl-prev {
            position: absolute;
            top: calc(50% - 20px);
            left: 0;
            margin-left: -20px !important;
            width: 40px;
            height: 40px;
            opacity: .8;
            border-radius: 50% !important;
            background-color: white !important;
            color: gray !important;
            --tw-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --tw-shadow-colored: 0 4px 6px -1px var(--tw-shadow-color), 0 2px 4px -2px var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
        }

        .owl-nav .owl-prev:hover {
            background-color: #FF003A !important;
            color: gray !important;
        }

        .owl-nav .owl-next:hover {
            background-color: #FF003A !important;
            color: white !important;
        }

        .custompacity {
            opacity: .2;
        }

        .full_description ul {
            list-style: circle;
            margin-left: 30px;
            list-style-image: url("/img/check.png");
        }

        .full_description ul li {
            line-height: 38px;
            color: #282828;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#singleServiceCarousel').owlCarousel({
                items: 1,
                loop: false,
                center: true,
                autoplay: true,
                dots: false,
                loop: true,
                margin: 10,
                nav: true,
                URLhashListener: true,
                autoplayHoverPause: true,
                startPosition: 'URLHash'
            });

            $('#singleServiceCarousel').on('changed.owl.carousel', function(event) {
                var x = $(location).attr('hash');
                let test = $(`a[href='${x}']`);
                test.siblings().children().addClass('custompacity')
                test.children().removeClass('custompacity')
            });

            // Portfili slider : Only show on mobile
            $('#portfolioSlider').owlCarousel({
                items: 2,
                center: true,
                loop: true,
                margin: 10,
                dots: false
            });

            $('#serviceslider').owlCarousel({
                items: 2,
                loop: true,
                margin: 10,
                dots:false
            });

        });
    </script>
@endpush

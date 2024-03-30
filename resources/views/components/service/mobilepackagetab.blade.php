@if ($service->package)
    <div class="col-span-12 lg:col-span-4">
        <div class="border p-3 sticky top-36 rounded-md">
            <nav class="flex space-x-2" aria-label="Tabs" role="tablist">
                <button type="button"
                    class="hs-tab-active:bg-black border hs-tab-active:text-white hs-tab-active:hover:text-white hs-tab-active:dark:text-white py-2 px-4 basis-0 grow inline-flex justify-center items-center gap-x-2 bg-transparent text-sm font-bold text-center text-black hover:text-brand rounded-[4px] disabled:opacity-50 disabled:pointer-events-none dark:text-gray-400 dark:hover:text-gray-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 active"
                    id="equal-width-elements-item-one" data-hs-tab="#equal-width-elements-one"
                    aria-controls="equal-width-elements-one" role="tab">
                    Starter
                </button>
                <button type="button"
                    class="hs-tab-active:bg-black border hs-tab-active:text-white hs-tab-active:hover:text-white hs-tab-active:dark:text-white py-2 px-4 basis-0 grow inline-flex justify-center items-center gap-x-2 bg-transparent text-sm font-bold text-center text-black hover:text-brand rounded-[4px] disabled:opacity-50 disabled:pointer-events-none dark:text-gray-400 dark:hover:text-gray-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                    id="equal-width-elements-item-two" data-hs-tab="#equal-width-elements-two"
                    aria-controls="equal-width-elements-two" role="tab">
                    Standard
                </button>
                <button type="button"
                    class="hs-tab-active:bg-black border hs-tab-active:text-white hs-tab-active:hover:text-white hs-tab-active:dark:text-white py-2 px-4 basis-0 grow inline-flex justify-center items-center gap-x-2 bg-transparent text-sm font-bold text-center text-black hover:text-brand rounded-[4px] disabled:opacity-50 disabled:pointer-events-none dark:text-gray-400 dark:hover:text-gray-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                    id="equal-width-elements-item-three" data-hs-tab="#equal-width-elements-three"
                    aria-controls="equal-width-elements-three" role="tab">
                    Advance
                </button>
            </nav>
            <div class="mt-3">
                <div id="equal-width-elements-one" role="tabpanel" aria-labelledby="equal-width-elements-item-one">
                    <h1 class="text-[26px] leading-[32px] py-2 font-bold">
                        ${{ optional($service->package)->starter_price }}</h1>
                    <div class="flex items-center space-x-1">
                        <span class="text-md font-bold">Save up to 10% with <span class="text-primary">Subscribe
                                to
                                save</span></span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                        </svg>
                    </div>
                    <p class="py-2 text-[18px] leading-[26px]">
                        {{ $service->package->starter_short_description }}
                    </p>
                    <div class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <x-h4>
                            {{ $service->package->starter_deliver_time }} Days Delivery
                        </x-h4>>
                    </div>
                    <div class="py-2 text-[18px] leading-[30px] full_description">
                        {!! $service->package->starter_full_description !!}
                    </div>
                    <div class="space-y-2">
                        {{-- <form action="{{ route('checkoutpage') }}" method="POST" class="space-y-2">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $service->id }}">
                                    <input type="hidden" name="package" value="starter">
                                    <input type="hidden" name="price" value="{{ $service->package->starter_price }}">
                                </form> --}}
                        <a href="{{ $service->package->starter_url ?? '#' }}"
                            class="w-full py-2 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-sm border border-black bg-black text-white hover:text-gray-800 hover:bg-white disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                            Continue ( ${{ $service->package->starter_price }})
                        </a>
                        <a href="https://calendly.com/monodeepsamanta/15min" target="_blank"
                            class="w-full py-2 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-sm border border-black bg-white text-black hover:bg-[#1b1021] hover:text-white disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                            Book a Meeting
                        </a>
                    </div>
                </div>
                <div id="equal-width-elements-two" class="hidden" role="tabpanel"
                    aria-labelledby="equal-width-elements-item-two">
                    <h1 class="text-[26px] leading-[32px] py-2 font-bold">${{ $service->package->standard_price }}
                    </h1>
                    <div class="flex items-center space-x-1">
                        <span class="text-md font-bold">Save up to 10% with <span class="text-primary">Subscribe
                                to
                                save</span></span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                        </svg>
                    </div>
                    <p class="py-2 text-[18px] leading-[26px]">
                        {{ $service->package->standard_short_description }}
                    </p>
                    <div class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <x-h4>
                            {{ $service->package->standard_deliver_time }} Days Delivery
                        </x-h4>
                        </h1>
                    </div>
                    <div class="py-2 text-[18px] leading-[30px] full_description">
                        {!! $service->package->standard_full_description !!}
                    </div>
                    <div class="space-y-2">
                        <form action="" method="POST" class="space-y-2">
                            @csrf
                            <input type="hidden" name="id" value="{{ $service->id }}">
                            <input type="hidden" name="package" value="standard">
                            <input type="hidden" name="price" value="{{ $service->package->standard_price }}">
                            <a href="{{ $service->package->standard_url ?? '#' }}"
                                class="w-full py-2 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-sm border border-black bg-black text-white hover:text-gray-800 hover:bg-white disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                Continue ( ${{ $service->package->standard_price }})
                            </a>
                        </form>
                        <a href="https://calendly.com/monodeepsamanta/15min" target="_blank"
                            class="w-full py-2 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-sm border border-black bg-white text-black hover:bg-[#1b1021] hover:text-white disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                            Book a Meeting
                        </a>
                    </div>

                </div>
                <div id="equal-width-elements-three" class="hidden" role="tabpanel"
                    aria-labelledby="equal-width-elements-item-three">
                    <h1 class="text-[26px] leading-[32px] py-2 font-bold">${{ $service->package->advance_price }}
                    </h1>
                    <div class="flex items-center space-x-1">
                        <span class="text-md font-bold">Save up to 10% with <span class="text-primary">Subscribe
                                to
                                save</span></span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                        </svg>
                    </div>
                    <p class="py-2 text-[18px] leading-[26px]">
                        {{ $service->package->advance_short_description }}
                    </p>
                    <div class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <x-h4>
                            {{ $service->package->advance_deliver_time }} Days Delivery
                        </x-h4>
                    </div>
                    <div class="py-3 text-[18px] leading-[30px] full_description">
                        {!! $service->package->advance_full_description !!}
                    </div>
                    <div class="space-y-2">
                        {{-- <form action="{{ route('checkoutpage') }}" method="POST" class="space-y-2">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $service->id }}">
                                    <input type="hidden" name="package" value="advance">
                                    <input type="hidden" name="price" value="{{ $service->package->advance_price }}">
                                </form> --}}
                        <a href="{{ $service->package->advance_url ?? '#' }}"
                            class="w-full py-2 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-sm border border-black bg-black text-white hover:text-gray-800 hover:bg-white disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                            Continue ( ${{ $service->package->advance_price }})
                        </a>
                        <a href="https://calendly.com/monodeepsamanta/15min" target="_blank"
                            class="w-full py-2 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-sm border border-black bg-white text-black hover:bg-[#1b1021] hover:text-white disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                            Book a Meeting
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

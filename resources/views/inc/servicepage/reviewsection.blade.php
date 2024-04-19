<div class="hidden lg:block my-8 p-8 bg-gray-50 space-y-4">
    <h3 class="text-[22px] leading-[32px] font-semibold">Submit a review</h3>


    {{-- <form id="reviewForm" action="{{ route('reviewsubmit') }}" method="POST" enctype="multipart/form-data"> --}}
    <form id="reviewForm" action="{{ route('reviewsubmit') }}" method="POST">
        @csrf
        <input type="hidden" name="service_id" value="{{$service->id}}">
        <div>
            <label for="name" class="block text-[15px] leading-[25px] font-normal mb-2 dark:text-white">Name <span
                    class="text-red-600">*</span></label>
            <input type="text" id="name" name="name"
                class="py-3 px-4 block w-full border-gray-200 text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" value="{{old('name')}}">

            @error('name')
                <p class="text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="email" class="block text-[15px] leading-[25px] font-normal py-3 dark:text-white">Email <span
                    class="text-red-600">*</span></label>
            <input type="text" id="email" name="email"
                class="py-3 px-4 block w-full border-gray-200 text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" value="{{old('email')}}">

            @error('email')
                <p class="text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div class="py-5">
            <ul role="list" class="marker:text-blue-600 space-y-2 text-sm text-black dark:text-gray-400">
                <li class="flex space-x-2">
                    <span class="ext-black text-[16px] leading-[28px] font-bold">Seller communication
                        level</span>
                    <!-- Rating -->

                    <div class="flex flex-row-reverse justify-end items-center">
                        <input id="hs-seller-readonly-1" type="radio"
                            class="peer -ms-5 w-5 h-5 bg-transparent border-0 text-transparent cursor-pointer appearance-none checked:bg-none focus:bg-none focus:ring-0 focus:ring-offset-0"
                            name="review_communication" value="5" @if(old('review_communication')=="5")  @endif  checked>
                        <label for="hs-seller-readonly-1"
                            class="peer-checked:text-yellow-400 text-gray-300 pointer-events-none dark:peer-checked:text-yellow-600 dark:text-gray-600">
                            <svg class="flex-shrink-0 w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>
                        </label>
                        <input id="hs-seller-readonly-2" type="radio"
                            class="peer -ms-5 w-5 h-5 bg-transparent border-0 text-transparent cursor-pointer appearance-none checked:bg-none focus:bg-none focus:ring-0 focus:ring-offset-0"
                            name="review_communication" value="4" @if(old('review_communication')=="4")  checked @endif >
                        <label for="hs-seller-readonly-2"
                            class="peer-checked:text-yellow-400 text-gray-300 pointer-events-none dark:peer-checked:text-yellow-600 dark:text-gray-600">
                            <svg class="flex-shrink-0 w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>
                        </label>
                        <input id="hs-seller-readonly-3" type="radio"
                            class="peer -ms-5 w-5 h-5 bg-transparent border-0 text-transparent cursor-pointer appearance-none checked:bg-none focus:bg-none focus:ring-0 focus:ring-offset-0"
                            name="review_communication" value="3" @if(old('review_communication')=="3")  checked @endif >
                        <label for="hs-seller-readonly-3"
                            class="peer-checked:text-yellow-400 text-gray-300 pointer-events-none dark:peer-checked:text-yellow-600 dark:text-gray-600">
                            <svg class="flex-shrink-0 w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>
                        </label>
                        <input id="hs-seller-readonly-4" type="radio"
                            class="peer -ms-5 w-5 h-5 bg-transparent border-0 text-transparent cursor-pointer appearance-none checked:bg-none focus:bg-none focus:ring-0 focus:ring-offset-0"
                            name="review_communication" value="2" @if(old('review_communication')=="2") checked @endif >
                        <label for="hs-seller-readonly-4"
                            class="peer-checked:text-yellow-400 text-gray-300 pointer-events-none dark:peer-checked:text-yellow-600 dark:text-gray-600">
                            <svg class="flex-shrink-0 w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>
                        </label>
                        <input id="hs-seller-readonly-5" type="radio"
                            class="peer -ms-5 w-5 h-5 bg-transparent border-0 text-transparent cursor-pointer appearance-none checked:bg-none focus:bg-none focus:ring-0 focus:ring-offset-0"
                            name="review_communication" value="1" @if(old('review_communication')=="1") checked @endif >
                        <label for="hs-seller-readonly-5"
                            class="peer-checked:text-yellow-400 text-gray-300 pointer-events-none dark:peer-checked:text-yellow-600 dark:text-gray-600">
                            <svg class="flex-shrink-0 w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>
                        </label>
                    </div>
                    <!-- End Rating -->
                </li>
                @error('review_communication')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror

                <li class="flex space-x-2">
                    <span class="ext-black text-[16px] leading-[28px] font-medium">Recommend to a friend</span>
                    <!-- Rating -->
                    <div class="flex flex-row-reverse justify-end items-center">
                        <input id="hs-friend-readonly-1" type="radio"
                            class="peer -ms-5 w-5 h-5 bg-transparent border-0 text-transparent cursor-pointer appearance-none checked:bg-none focus:bg-none focus:ring-0 focus:ring-offset-0"
                            name="review_recommend" value="5" @if(old('review_recommend')=="5")   @endif checked>
                        <label for="hs-friend-readonly-1"
                            class="peer-checked:text-yellow-400 text-gray-300 pointer-events-none dark:peer-checked:text-yellow-600 dark:text-gray-600">
                            <svg class="flex-shrink-0 w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>
                        </label>
                        <input id="hs-friend-readonly-2" type="radio"
                            class="peer -ms-5 w-5 h-5 bg-transparent border-0 text-transparent cursor-pointer appearance-none checked:bg-none focus:bg-none focus:ring-0 focus:ring-offset-0"
                            name="review_recommend" value="4"  @if(old('review_recommend')=="4")  checked @endif>
                        <label for="hs-friend-readonly-2"
                            class="peer-checked:text-yellow-400 text-gray-300 pointer-events-none dark:peer-checked:text-yellow-600 dark:text-gray-600">
                            <svg class="flex-shrink-0 w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>
                        </label>
                        <input id="hs-friend-readonly-3" type="radio"
                            class="peer -ms-5 w-5 h-5 bg-transparent border-0 text-transparent cursor-pointer appearance-none checked:bg-none focus:bg-none focus:ring-0 focus:ring-offset-0"
                            name="review_recommend" value="3"  @if(old('review_recommend')=="3")  checked @endif>
                        <label for="hs-friend-readonly-3"
                            class="peer-checked:text-yellow-400 text-gray-300 pointer-events-none dark:peer-checked:text-yellow-600 dark:text-gray-600">
                            <svg class="flex-shrink-0 w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>
                        </label>
                        <input id="hs-friend-readonly-4" type="radio"
                            class="peer -ms-5 w-5 h-5 bg-transparent border-0 text-transparent cursor-pointer appearance-none checked:bg-none focus:bg-none focus:ring-0 focus:ring-offset-0"
                            name="review_recommend" value="2"  @if(old('review_recommend')=="2")  checked @endif>
                        <label for="hs-friend-readonly-4"
                            class="peer-checked:text-yellow-400 text-gray-300 pointer-events-none dark:peer-checked:text-yellow-600 dark:text-gray-600">
                            <svg class="flex-shrink-0 w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>
                        </label>
                        <input id="hs-friend-readonly-5" type="radio"
                            class="peer -ms-5 w-5 h-5 bg-transparent border-0 text-transparent cursor-pointer appearance-none checked:bg-none focus:bg-none focus:ring-0 focus:ring-offset-0"
                            name="review_recommend" value="1"  @if(old('review_recommend')=="1")  checked @endif>
                        <label for="hs-friend-readonly-5"
                            class="peer-checked:text-yellow-400 text-gray-300 pointer-events-none dark:peer-checked:text-yellow-600 dark:text-gray-600">
                            <svg class="flex-shrink-0 w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>
                        </label>
                    </div>
                    <!-- End Rating -->
                </li>
                @error('review_recommend')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror

                <li class="flex space-x-2">
                    <span class="ext-black text-[16px] leading-[28px] font-medium">Service as described </span>
                    <!-- Rating -->
                    <div class="flex flex-row-reverse justify-end items-center">
                        <input id="hs-service-readonly-1" type="radio"
                            class="peer -ms-5 w-5 h-5 bg-transparent border-0 text-transparent cursor-pointer appearance-none checked:bg-none focus:bg-none focus:ring-0 focus:ring-offset-0"
                            name="review_described" value="5" @if(old('review_described')=="5")   @endif checked>
                        <label for="hs-service-readonly-1"
                            class="peer-checked:text-yellow-400 text-gray-300 pointer-events-none dark:peer-checked:text-yellow-600 dark:text-gray-600">
                            <svg class="flex-shrink-0 w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>
                        </label>
                        <input id="hs-service-readonly-2" type="radio"
                            class="peer -ms-5 w-5 h-5 bg-transparent border-0 text-transparent cursor-pointer appearance-none checked:bg-none focus:bg-none focus:ring-0 focus:ring-offset-0"
                            name="review_described" value="4"  @if(old('review_described')=="4")  checked @endif>
                        <label for="hs-service-readonly-2"
                            class="peer-checked:text-yellow-400 text-gray-300 pointer-events-none dark:peer-checked:text-yellow-600 dark:text-gray-600">
                            <svg class="flex-shrink-0 w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>
                        </label>
                        <input id="hs-service-readonly-3" type="radio"
                            class="peer -ms-5 w-5 h-5 bg-transparent border-0 text-transparent cursor-pointer appearance-none checked:bg-none focus:bg-none focus:ring-0 focus:ring-offset-0"
                            name="review_described" value="3"  @if(old('review_described')=="3")  checked @endif>
                        <label for="hs-service-readonly-3"
                            class="peer-checked:text-yellow-400 text-gray-300 pointer-events-none dark:peer-checked:text-yellow-600 dark:text-gray-600">
                            <svg class="flex-shrink-0 w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>
                        </label>
                        <input id="hs-service-readonly-4" type="radio"
                            class="peer -ms-5 w-5 h-5 bg-transparent border-0 text-transparent cursor-pointer appearance-none checked:bg-none focus:bg-none focus:ring-0 focus:ring-offset-0"
                            name="review_described" value="2"  @if(old('review_described')=="2")  checked @endif>
                        <label for="hs-service-readonly-4"
                            class="peer-checked:text-yellow-400 text-gray-300 pointer-events-none dark:peer-checked:text-yellow-600 dark:text-gray-600">
                            <svg class="flex-shrink-0 w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>
                        </label>
                        <input id="hs-service-readonly-5" type="radio"
                            class="peer -ms-5 w-5 h-5 bg-transparent border-0 text-transparent cursor-pointer appearance-none checked:bg-none focus:bg-none focus:ring-0 focus:ring-offset-0"
                            name="review_described" value="1"  @if(old('review_described')=="1")  checked @endif>
                        <label for="hs-service-readonly-5"
                            class="peer-checked:text-yellow-400 text-gray-300 pointer-events-none dark:peer-checked:text-yellow-600 dark:text-gray-600">
                            <svg class="flex-shrink-0 w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>
                        </label>
                    </div>
                    <!-- End Rating -->

                </li>
                @error('review_described')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror
            </ul>
        </div>

        <textarea
            class="py-3 px-4 block w-full border-gray-200 text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
            rows="6" placeholder="Write your review" name="review" >{{old('review')}}</textarea>
        @error('review')
            <p class="text-red-600">{{ $message }}</p>
        @enderror
        <div>
            <label for="website" class="block text-[15px] leading-[25px] font-normal py-3 dark:text-white">Website
                <span class="text-red-600">*</span></label>
            <input type="text" id="website" name="website" value="{{old('website')}}"
                class="py-3 px-4 block w-full border-gray-200 text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">

            @error('review_url')
                <p class="text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <br>
        <div>
            <button type="submit"
                class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-sm border border-transparent bg-black text-white hover:bg-[#FF003A] disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                Submit Review
            </button>
        </div>

    </form>
</div>

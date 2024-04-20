@extends('admin.layouts.app')
@section('title', 'Home Page')
@section('content')
    {{-- @if ($errors->any())
        <div class="text-red-500">
            <p><strong>Opps Something went wrong</strong></p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

    <div class="bg-white dark:bg-gray-800 dark:text-slate-400 p-2">
        <form action="{{ route('service.slider.store', $service->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-12 gap-5 ">
                <div class="col-span-12 bg-white dark:bg-gray-800 p-4 rounded-lg">

                    <div class="py-2">
                        <div class="flex gap-4">

                            <button type="button" id="addImageButton"
                                class="py-3 w-full px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-500 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                </svg>
                                Add Image
                            </button>
                            <button type="button" id="addVideoButton"
                                class="py-3 w-full px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-500 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                </svg>
                                Add Video IFrame
                            </button>
                        </div>

                        <div class="">
                            <div class="grid grid-cols-3" id="drofifySectionDiv">
                                {{-- @foreach ($photos as $key => $slider)
                                    <div class="col-span-2 lg:col-span-1 p-4">
                                        <div
                                            class="flex flex-col my-4 bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                                            <div
                                                class="flex justify-between bg-gray-100 border-b rounded-t-xl py-3 px-4 md:py-4 md:px-5 dark:bg-slate-900 dark:border-gray-700">
                                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-500">
                                                    Add Slider Image
                                                </p>
                                                <input type="hidden" value="{{$key}}" name="ordernumber[]" />
                                                <button type="button" class="removesectionbutton">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-6 h-6 text-red-600">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                    </svg>
                                                </button>
                                            </div>
                                            <div>
                                                <input class="dropify" type="file" name="thumbnails[${lng}]" data-default-file="{{ asset('storage/' . $service->thumbnail) }}" >
                                            </div>

                                        </div>
                                    </div>
                                @endforeach --}}
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <x-form.submit-button title="Update" />
        </form>

        @if ($photos->count())
            <div>
                <div
                    class="py-3 flex items-center text-sm text-gray-800 before:flex-[1_1_0%] before:border-t before:border-gray-200 before:me-6 after:flex-[1_1_0%] after:border-t after:border-gray-200 after:ms-6 dark:text-white dark:before:border-gray-600 dark:after:border-gray-600">
                    Slider Images</div>

                <div id="photosDivParent">
                    <div class="space-y-2 py-2" id="photosDiv">
                    </div>
                </div>
                <div class="flex flex-wrap">
                    @foreach ($photos as $photo)
                        @if ($photo->video)
                            <div class="relative p-2">
                                <a href="{{ route('removesliderimage', $photo->id) }}"
                                    onclick="if (confirm('Delete selected item?')){return true;}else{event.stopPropagation(); event.preventDefault();};"
                                    class="absolute right-0 p-2 mr-2 bg-red-600 rounded-2xl z-10">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </a>
                                <video controls muted class="w-52 h-52 shadow-md rounded-3xl object-cover p-2">
                                    <source src="{{ asset('uploads/service/video/' . $photo->video) }}" type="video/mp4">
                                </video>
                            </div>
                        @else
                        @endif
                    @endforeach
                </div>
            </div>
        @endif
    </div>

@endsection
@push('style')
    <link rel="stylesheet" href="{{ asset('css/dropify.min.css') }}">
    <style>
        .dropify-message p {
            font-size: 24px
        }
    </style>
@endpush

@push('script')
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="{{ asset('js/dropify.min.js') }}"></script>
    <script src="{{ asset('plugin/Sortable.min.js') }}"></script>
    <script src="{{ asset('js/sortablejs.js') }}"></script>
    <script>
        @foreach ($service->sliders as $slider)
            photos.push('{{ $slider->thumbnail ?? $slider->video }}')
        @endforeach
    </script>


    <script>
        $(document).ready(function() {
            createDrofify();
            $(document).on('click', '#addImageButton', function() {
                let lng = $('#drofifySectionDiv').children().length;

                $('#drofifySectionDiv').append(
                    `
                    <div class="col-span-2 lg:col-span-1 p-4">
                        <div
                            class="flex flex-col my-4 bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                            <div
                                class="flex justify-between bg-gray-100 border-b rounded-t-xl py-3 px-4 md:py-4 md:px-5 dark:bg-slate-900 dark:border-gray-700">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-500">
                                    Add Slider Image
                                </p>
                                <input type="hidden" value="${lng}" name="ordernumber[]" />
                                <button type="button" class="removesectionbutton">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-600">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </button>
                            </div>
                            <div>
                                <input class="dropify" type="file" name="thumbnails[${lng}]">

                            </div>

                        </div>
                    </div>
            `
                );
                createDrofify();
                generateOrderNumber();
            });


            $(document).on('click', '#addVideoButton', function() {
                let lng = $('#drofifySectionDiv').children().length;
                $('#drofifySectionDiv').append(
                    `
                    <div class="col-span-2 lg:col-span-1 p-4">
                        <div
                            class="flex flex-col my-4 bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                            <div
                                class="flex justify-between bg-gray-100 border-b rounded-t-xl py-3 px-4 md:py-4 md:px-5 dark:bg-slate-900 dark:border-gray-700">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-500">
                                    Add Video IFrame
                                </p>
                                <input type="hidden" value="${lng}" name="ordernumber[]" />
                                <button type="button" class="removesectionbutton">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-600">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </button>
                            </div>
                            <div class="p-4">
                                <div class="space-y-1 py-2">
                                    <label for="" class="text-gray-500 dark:text-gray-500 text-sm font-medium mb-2 ">Video IFrameTag</label>
                                    <textarea id="" name="iframes[${lng}]" class="iframe py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" rows="5" placeholder="Video IFrame Tag"></textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                     `
                );
                videoPortfolio();
                generateOrderNumber();
            });

            function createDrofify() {
                $('.dropify').dropify({
                    messages: {
                        'default': 'image file drop here or click',
                        'replace': 'Drag and drop or click to replace',
                        'remove': 'Remove',
                        'error': 'Ooops, something wrong happended.'
                    }
                });
            }

            function videoPortfolio() {
                $('.videoThumbnail').dropify({
                    messages: {
                        'default': 'Video file drop here or click',
                        'replace': 'Drag and drop or click to replace',
                        'remove': 'Remove',
                        'error': 'Ooops, something wrong happended.'
                    }
                });
            }

        });

        function generateOrderNumber() {
            let dragItems = $('#drofifySectionDiv').children();
            $.each(dragItems, function(index, value) {
                $(this).find("input[name='ordernumber[]']").val(index)

                if ($(this).find("input.dropify")) {
                    $(this).find("input.dropify").attr("name", `thumbnails[${index}]`);
                }
                if ($(this).find("textarea.iframe")) {
                    $(this).find("textarea.iframe").attr("name", `iframes[${index}]`);
                }
            });
        }


        $(document).on('click', '.removesectionbutton', function() {
            $(this).parent().parent().parent().remove();
            generateOrderNumber();
        });
        var simpleList = document.querySelector("#drofifySectionDiv");

        var sortable = new Sortable(simpleList, {
            animation: 150,
            ghostClass: 'bg-light',
            onChange: function(evt) {
                generateOrderNumber();
            }
        });
    </script>
@endpush

@extends('admin.layouts.app')
@section('title', 'Home Page')
@section('content')

    <div class="bg-white dark:bg-gray-800 dark:text-slate-400 p-2">
        <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-12 gap-5 ">
                <div class="col-span-12 bg-white dark:bg-gray-800 p-4 rounded-lg">

                    <div class="py-2">
                        <div class="flex gap-4">

                            <button type="button" id="addImageButton"
                                class="py-3 w-full px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-500 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                  </svg>

                                Add Item
                            </button>

                        </div>

                        <div class="">
                            <div class="grid grid-cols-3" id="drofifySectionDiv">
                                @foreach ($photos as $key => $slider)

                                        <div class="col-span-2 lg:col-span-1 p-4">
                                            <div
                                                class="flex flex-col my-4 bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                                                <div
                                                    class="flex justify-between bg-gray-100 border-b rounded-t-xl py-3 px-4 md:py-4 md:px-5 dark:bg-slate-900 dark:border-gray-700">
                                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-500">
                                                        Add Items
                                                    </p>
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
                                                    <input type="hidden" class=".hideinput" name="images[]"
                                                        value="{{ $slider->photo }}">
                                                    <input class="dropify" type="file" name="thumbnails[]"
                                                        data-default-file="{{ asset('storage/' . $slider->photo) }}">
                                                </div>

                                            </div>
                                        </div>

                                @endforeach
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <x-form.submit-button title="Update" />
        </form>
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
    {{-- <script>
        @foreach ($service->sliders as $slider)
            photos.push('{{ $slider->thumbnail ?? $slider->video }}')
        @endforeach
    </script> --}}


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
                                    Add items
                                </p>

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


        });

        function generateOrderNumber() {
            let dragItems = $('#drofifySectionDiv').children();
            $.each(dragItems, function(index, value) {
                $(this).find("input[name='ordernumber[]']").val(index)

                if ($(this).find("input.dropify")) {
                    $(this).find("input.dropify").attr("name", `thumbnails[${index}]`);
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

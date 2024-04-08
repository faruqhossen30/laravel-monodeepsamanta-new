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
                    {{-- <x-form.thumbnail-multiple /> --}}

                    <div class="py-2">
                        <div class="flex gap-4">
                            <button type="button" onclick="showMultiPhotoModal()"
                                class="py-3 w-full px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-500 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                </svg>
                                Image Gallery
                            </button>

                            <button type="button" onclick="showAddVideoModal()"
                                class="py-3 w-full px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-500 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m15.75 10.5 4.72-4.72a.75.75 0 0 1 1.28.53v11.38a.75.75 0 0 1-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25h-9A2.25 2.25 0 0 0 2.25 7.5v9a2.25 2.25 0 0 0 2.25 2.25Z" />
                                </svg>
                                Insert Video
                            </button>

                        </div>
                        @error('slider')
                            <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                        @enderror
                        <div id="photosDivParent">
                            <div class="space-y-2 py-2" id="photosDiv">

                                {{-- @if (count($service->sliders))
                                    @foreach ($service->sliders as $slider)
                                        @if ($slider->video)
                                            <div class="flex items-center justify-between border dark:border-gray-800">
                                                <textarea name="slider[]"
                                                    class="py-3 px-4 block w-10/12 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                                                    rows="3" placeholder="This is a textarea placeholder">{{$slider->video}}</textarea>

                                                <span class="px-4 text-red-500 cursor-pointer"
                                                    onclick="removeVideo('${index}')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-4 h-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                    </svg>
                                                </span>
                                            </div>
                                        @else
                                            <div class="flex items-center justify-between border dark:border-gray-800">
                                                <input type="hidden" value="{{ $slider->thumbnail }}" name="slider[]">
                                                <img src="{{ asset('uploads/galleries/' . $slider->thumbnail) }}"
                                                    class="w-10 h-10" alt="Image">
                                                <span class="px-4 text-red-500 cursor-pointer"
                                                    onclick="removePhoto('{{ $slider->thumbnail }}')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-4 h-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                    </svg>
                                                </span>
                                            </div>
                                        @endif
                                    @endforeach

                                @endif --}}
                            </div>

                        </div>

                    </div>

                </div>
            </div>
            <x-form.submit-button title="Update" />
        </form>
        @include('admin.inc.modal.multi-photo-gallery')
        @include('admin.inc.modal.videoadd-modal')
    </div>

@endsection

@push('script')
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="{{ asset('plugin/Sortable.min.js') }}"></script>
    <script src="{{ asset('js/sortablejs.js') }}"></script>
    <script>
        @foreach ($service->sliders as $slider)
            photos.push('{{ $slider->thumbnail ??  $slider->video}}')
        @endforeach
        generatePhotoInput();
    </script>
@endpush

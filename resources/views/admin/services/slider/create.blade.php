@extends('admin.layouts.app')
@section('title', 'Home Page')
@section('content')



    @if ($errors->any())
        <div class="text-red-500">
            <p><strong>Opps Something went wrong</strong></p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white dark:bg-gray-800 dark:text-slate-400 p-2">








        <form action="{{ route('service.slider.store', $service->id) }}" method="POST" enctype="multipart/form-data">
            @csrf


            <div class="grid grid-cols-12 gap-5 ">
                <div class="col-span-12 lg:col-span-6 bg-white dark:bg-gray-800 p-4 rounded-lg">
                    <x-form.thumbnail-multiple  />

                </div>
                <div class="col-span-12 lg:col-span-6 bg-white dark:bg-gray-800 p-4 rounded-lg">
                    <div class="py-2">
                        <button type="button" onclick="showMultiPhotoModal()"
                            class="py-3 w-full px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-500 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m15.75 10.5 4.72-4.72a.75.75 0 0 1 1.28.53v11.38a.75.75 0 0 1-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25h-9A2.25 2.25 0 0 0 2.25 7.5v9a2.25 2.25 0 0 0 2.25 2.25Z" />
                              </svg>


                            Video Gallery
                        </button>

                        <div class="space-y-2 py-2" id="photosDiv">


                        </div>
                    </div>



                </div>




            </div>



            <x-form.submit-button title="Update" />
        </form>
        @include('admin.inc.modal.multi-photo-gallery')



    </div>


@endsection
{{--
@push('style')
    <link rel="stylesheet" href="{{ asset('css/dropify.min.css') }}">
    <style>
        .dropify-message p {
            font-size: 24px
        }
    </style>
@endpush --}}

@push('script')
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="{{ asset('plugin/Sortable.min.js') }}"></script>
    <script src="{{ asset('js/sortablejs.js') }}"></script>
    {{-- <script src="{{ asset('js/dropify.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            createDrofify();
            $(document).on('click', '#addImageButton', function() {
                $('#drofifySectionDiv').append(
                    `
                    <div class="col-span-2 lg:col-span-1 border p-4">
                        <input class="dropify" type="file" id="myDropify" name="thumbnails[]">
                        <input type="text" name="captions[]" class="py-3 px-4 block w-full border-gray-200 text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="Caption">
                    </div>
                `
                );
                createDrofify();
                console.log('click');
            });

            $(document).on('click', '#addVideoButton', function() {
                $('#drofifySectionDiv').append(
                    `
                    <div class="col-span-2 p-4 border lg:col-span-1">
                        <input class="videoThumbnail" type="file" id="videoPortfolio" name="video[]">
                        <input type="text" name="video_caption[]"
                            class="block w-full px-4 py-3 text-sm border-gray-200 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                            placeholder="Caption">
                    </div>
                `
                );
                videoPortfolio();
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
    </script> --}}
@endpush


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
            <x-form.thumbnail-multiple />


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


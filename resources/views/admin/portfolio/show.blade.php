@extends('admin.layouts.app')
@section('breadcrumb')
    <x-breadcrumb pageone="Portfolio" pageoneRoute="{{ route('portfolio.index') }}" pagetwo="Create" />
@endsection
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <p><strong>Opps Something went wrong</strong></p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="dark:text-slate-400 p-2">
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <form action="{{ route('portfolio.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="flex gap-4">
                            <button type="button" id="addImageSection"
                                class="py-3 w-full px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-500 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                </svg>
                                Add Image Section
                            </button>

                            <button type="button"
                                class="py-3 w-full px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-500 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m15.75 10.5 4.72-4.72a.75.75 0 0 1 1.28.53v11.38a.75.75 0 0 1-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25h-9A2.25 2.25 0 0 0 2.25 7.5v9a2.25 2.25 0 0 0 2.25 2.25Z" />
                                </svg>
                                Add Video Section
                            </button>

                        </div>

                        <div id="photosDiv">

                        </div>

                        @include('admin.inc.modal.photo-gallery')
                        <x-form.submit-button />
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="{{ asset('plugin/Sortable.min.js') }}"></script>
    <script src="{{ asset('js/sortablejs.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '#addImageSection', function() {
                console.log('click');
                $('#photosDiv').append(`
                <div class="p-4 md:p-5">
                    <x-form.input name="title" label="Title" />
                    <x-form.textarea name="description" label="Description" />
                    <x-form.thumbnail-single />
                </div>
                `)
            })
        });
    </script>
@endpush



{{-- <div class="p-4 md:p-5">
    <x-form.input name="title" label="Title" />
    <x-form.textarea name="description" label="Description" />
    <x-form.thumbnail-single />
</div> --}}

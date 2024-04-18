@extends('admin.layouts.app')
@section('breadcrumb')
    <x-breadcrumb pageone="Review" pageoneRoute="{{ route('review.index') }}" pagetwo="Edit" />
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
    <div class="bg-white dark:bg-gray-800 dark:text-slate-400 p-2">
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <form action="{{ route('review.update', $review->id) }}" method="POST" enctype="multipart/form-data"
                        class=" space-y-1">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-12 gap-5">
                            <div class="col-span-12 lg:col-span-8">
                                <x-form.input label="Buyer Name" name="name" value="{{ $review->name }}" />
                                <x-form.input label="Rating" name="rating" type="number" value="{{ $review->rating }}" />
                                <x-form.input label="Review URL" name="review_url" type="text"
                                    value="{{ $review->review_url }}" />
                                <x-form.textarea label="Review Text" type="text" name="review"
                                    value="{{ $review->review }}" />

                            </div>
                            <div class="col-span-12 lg:col-span-4">
                                <x-form.input label="Review Date" name="date" type="date"
                                    value="{{ $review->date->format('Y-m-d') }}" />
                                <x-form.select label="Review Type" name="review_type_id" :data="$types"
                                    :id="$review->review_type_id" />
                                <x-form.select label="Select Category" name="category_id" :data="$categories"
                                    :id="$review->category_id" />
                                <x-form.select-status :status="$review->status" />

                                    <div class="col-span-3 pt-1 space-y-2">
                                        <label for="thumbnail"
                                            class="text-gray-500 dark:text-gray-500 text-sm font-medium">Image</label>
                                        <input name="thumbnail" class="dropify" type="file" id="myDropify"
                                            data-default-file="{{ asset('storage/' . $review->thumbnail) }}">
                                    </div>
                            </div>
                        </div>
                        @include('admin.inc.modal.photo-gallery')
                        <x-form.submit-button title="Update" />
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('style')
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <script>
        $(document).ready(function() {
            $('.dropify').dropify({
                messages: {
                    'default': 'Drag and drop a file here or click',
                    'replace': 'Drag and drop or click to replace',
                    'remove': 'Remove',
                    'error': 'Ooops, something wrong happended.'
                }
            });
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endpush


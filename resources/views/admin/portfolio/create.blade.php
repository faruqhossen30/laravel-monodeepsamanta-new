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
                        <div class="grid grid-cols-12 gap-5 ">
                            <div class="col-span-12 lg:col-span-8 bg-white dark:bg-gray-800 p-4 rounded-lg">
                                <x-form.input label="Portfolio Title" name="title" />
                                <x-form.select label="Select Category" name="category_id" :data="$categories" />
                                <x-form.select-status />

                                <x-divider title="SEO Section" />
                                <x-form.input label="Meta Tag" name="meta_tag" />
                                <x-form.textarea label="Meta Description" name="meta_description" />
                                <x-form.input label="Meta Keyword" name="keyword" />


                            </div>
                            <div class="col-span-12 lg:col-span-4 bg-white dark:bg-gray-800 p-4 rounded-lg">
                                @include('components.form.video-thumbnail')
                                {{-- <x-form.thumbnail-single /> --}}
                                {{-- <x-form.thumbnail-multiple /> --}}
                                <input class="dropify" type="file" id="myDropify" name="thumbnail">
                            </div>

                        </div>
                        <x-form.submit-button />
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css">
    <style>
        .label-info {
            background-color: blue;
            padding: 8px 16px;
            color: white;
            border-radius: 16px;
            font-weight: bold;
        }
    </style>

<link rel="stylesheet" href="{{ asset('css/dropify.min.css') }}">
<style>
    .dropify-message p {
        font-size: 24px
    }
</style>
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

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

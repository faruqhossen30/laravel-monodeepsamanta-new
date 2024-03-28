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
                                {{-- <label for="input-label"
                                    class="block text-sm font-medium mb-2 dark:text-white">Email</label>
                                <input type="email" id="input-label"
                                    class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                                    placeholder="you@site.com" data-role="tagsinput"> --}}

                            </div>
                            <div class="col-span-12 lg:col-span-4 bg-white dark:bg-gray-800 p-4 rounded-lg">
                                @include('components.form.video-thumbnail')
                                <x-form.thumbnail-single />
                                <x-form.thumbnail-multiple />
                            </div>

                        </div>
                        @include('admin.inc.modal.photo-gallery')
                        @include('admin.inc.modal.multi-photo-gallery')
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
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
@endpush

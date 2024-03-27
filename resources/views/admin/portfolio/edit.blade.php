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
                    <form action="{{ route('portfolio.update', $portfolio->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-12 gap-5">
                            <div class="col-span-12 lg:col-span-8 bg-white dark:bg-gray-800 p-4 rounded-lg">
                                <x-form.input label="Portfolio Title" name="title" value="{{ $portfolio->title }}" />
                                <x-form.select label="Select Category" name="category_id" :data="$categories"
                                    :id="$portfolio->category_id" />
                                <x-form.select-status :status="$portfolio->status" />

                                <x-divider title="SEO Section" />
                                <x-form.input label="Meta Tag" name="meta_tag" :value="$portfolio->meta_tag" />
                                <x-form.textarea label="Meta Description" name="meta_description" :value="$portfolio->meta_description" />
                                <x-form.input label="Meta Keyword" name="keyword" :value="$portfolio->keyword" />
                            </div>
                            <div class="col-span-12 lg:col-span-4 bg-white dark:bg-gray-800 p-4 rounded-lg">
                                @if ($portfolio->video)
                                    <div>
                                        @php
                                            $resolution_data = ['240p', '360p', '480p', '720p', '1080p'];
                                        @endphp
                                        <label class="inline-flex items-center me-5 cursor-pointer space-x-2 py-2">
                                            <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Video
                                            </span>
                                            <input type="checkbox" value="" class="sr-only peer" checked disabled>
                                            <div
                                                class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600">
                                            </div>
                                        </label>

                                        <x-form.input name="pull_zone" label="Zone" :value="$portfolio->video->pull_zone" />
                                        <x-form.input name="video_id" label="Video ID" :value="$portfolio->video->video_id" />
                                        <div class="py-1">
                                            <label for="resolution" class="text-gray-500 dark:text-gray-500">Video
                                                Resolution {{ $portfolio->video->resolution }}</label>
                                            <select name="resolution" id="resolution"
                                                class="js-example-basic-multiple py-2 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                                                <option value="">Select</option>
                                                <option value="240p" @if ($portfolio->video->resolution == '240p') selected @endif>
                                                    240p</option>
                                                <option value="360p" @if ($portfolio->video->resolution == '360p') selected @endif>
                                                    360p</option>
                                                <option value="480p" @if ($portfolio->video->resolution == '480p') selected @endif>
                                                    480p</option>
                                                <option value="720p" @if ($portfolio->video->resolution == '720p') selected @endif>
                                                    720p</option>
                                                <option value="1080p" @if ($portfolio->video->resolution == '1080p') selected @endif>
                                                    1080p</option>
                                            </select>
                                            @error('{{ $resolution }}')
                                                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>


                                    </div>
                                @else
                                    @include('components.form.video-thumbnail')
                                @endif

                                <x-form.thumbnail-single :thumbnail="$portfolio->thumbnail" />
                                <x-form.thumbnail-multiple :data="$portfolio" />
                            </div>
                        </div>
                        @include('admin.inc.modal.photo-gallery')
                        @include('admin.inc.modal.multi-photo-gallery')
                        <x-form.submit-button title="Update" />
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

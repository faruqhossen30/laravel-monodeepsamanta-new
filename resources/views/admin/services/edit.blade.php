@extends('admin.layouts.app')
@section('breadcrumb')
    <x-breadcrumb pageone="Service" pageoneRoute="{{ route('service.index') }}" pagetwo="Create" />
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
                    <form action="{{ route('service.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-12 gap-5 ">
                            <div class="col-span-12 lg:col-span-8 bg-white dark:bg-gray-800 p-4 rounded-lg">
                                <x-form.input label="Title" name="title" value="{{ $service->title }}" />
                                <x-form.select label="Select Category" name="category_id" :data="$categories"
                                    :id="$service->id" />
                                <x-form.select-status :status="$service->status" />
                                <div>
                                    <textarea name="description" id="editor" cols="30" rows="10">{{ $service->description }}</textarea>
                                    @error('description')
                                        <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="pt-8">
                                    <x-form.card title="SEO Section" class="p-8">
                                        <x-form.input label="Meta Title" name="meta_title" :value="$service->meta_title" />
                                        <x-form.textarea label="Meta Description" name="meta_description"
                                            :value="$service->meta_description" />
                                        <x-form.input label="Meta Keyword" name="meta_keyword" :value="$service->meta_keyword" />
                                    </x-form.card>
                                </div>

                            </div>
                            <div class="col-span-12 lg:col-span-4 bg-white dark:bg-gray-800 p-4 rounded-lg">


                                @if ($service->video)
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

                                        <x-form.input name="pull_zone" label="Zone" :value="$service->video->pull_zone" />
                                        <x-form.input name="video_id" label="Video ID" :value="$service->video->video_id" />
                                        <div class="py-1">
                                            <label for="resolution" class="text-gray-500 dark:text-gray-500">Video
                                                Resolution {{ $service->video->resolution }}</label>
                                            <select name="resolution" id="resolution"
                                                class="js-example-basic-multiple py-2 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                                                <option value="">Select</option>
                                                <option value="240p" @if ($service->video->resolution == '240p') selected @endif>
                                                    240p</option>
                                                <option value="360p" @if ($service->video->resolution == '360p') selected @endif>
                                                    360p</option>
                                                <option value="480p" @if ($service->video->resolution == '480p') selected @endif>
                                                    480p</option>
                                                <option value="720p" @if ($service->video->resolution == '720p') selected @endif>
                                                    720p</option>
                                                <option value="1080p" @if ($service->video->resolution == '1080p') selected @endif>
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
                                {{-- @include('components.form.video-thumbnail') --}}
                                <x-form.thumbnail-single :thumbnail="$service->thumbnail" />
                            </div>

                            <div class="col-span-12 lg:col-span-12 bg-white  dark:bg-gray-800 p-4 rounded-lg">
                                <div>
                                    <h4 class="p-2">Servie Featurs Table </h4>
                                    <div>
                                        <div class="flex">
                                            <input type="text" name="featuredetails"
                                                class="py-3 px-4 pe-11 block w-1/2 border-gray-200 sm:shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                                                placeholder="Description">

                                            <input type="text" name="starter"
                                                class="py-3 px-4 pe-11 block w-1/6 border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                                                placeholder="Starter">

                                            <input type="text" name="standard"
                                                class="py-3 px-4 pe-11 block w-1/6 border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                                                placeholder="Standard">

                                            <input type="text" name="advanced"
                                                class="py-3 px-4 pe-11 block w-1/6 border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                                                placeholder="Advanced">
                                        </div>
                                        <div>
                                            <button type="button" id="addButton"
                                                class="py-1 my-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800"
                                                placeholder="Starter">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">
                                                    <path d="M11 2H9v3h2V2Z" />
                                                    <path
                                                        d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0ZM1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5Zm3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4v4.5ZM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5V15Z" />
                                                </svg>

                                                Add New
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex flex-col">
                                        <div class="-m-1.5 overflow-x-auto">
                                            <div class="p-1.5 min-w-full inline-block align-middle">
                                                <div class="border rounded-lg overflow-hidden dark:border-gray-700">
                                                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                                        <thead class="bg-gray-50 dark:bg-gray-700">
                                                            <tr>
                                                                <th scope="col"
                                                                    class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-gray-400">
                                                                    S.N</th>
                                                                <th scope="col"
                                                                    class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-gray-400">
                                                                    Description</th>
                                                                <th scope="col"
                                                                    class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-gray-400">
                                                                    Starter</th>
                                                                <th scope="col"
                                                                    class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-gray-400">
                                                                    Standard</th>
                                                                <th scope="col"
                                                                    class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-gray-400">
                                                                    Advanced</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="simple-list"
                                                            class="divide-y divide-gray-200 dark:divide-gray-700">
                                                            @foreach ($service->features as $feature)
                                                                <tr>
                                                                    <input type="hidden" name="featuredetails[]"
                                                                        value="{{ $feature->feature }}">
                                                                    <input type="hidden" name="starter[]"
                                                                        value="{{ $feature->starter }}">
                                                                    <input type="hidden" name="standard[]"
                                                                        value="{{ $feature->standard }}">
                                                                    <input type="hidden" name="advanced[]"
                                                                        value="{{ $feature->advanced }}">
                                                                    <td
                                                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                                        #</td>
                                                                    <td
                                                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                                        {{ $feature->feature }} </td>
                                                                    <td
                                                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                                        {{ $feature->starter }} </td>
                                                                    <td
                                                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                                        {{ $feature->standard }} </td>
                                                                    <td
                                                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200 flex justify-between items-center">
                                                                        <span
                                                                            class="">{{ $feature->advanced }}</span>
                                                                        <span
                                                                            class="bg-red-500 p-1 rounded-full text-white cursor-pointer close-icon">x</span>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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







@push('style')
    <script src="{{ asset('js/ckeditor.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/ckeditor.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/dropify.min.css') }}"> --}}
    <style>
        .ck-editor__editable_inline {
            height: 300px;
        }

        .dropify-message p {
            font-size: 24px
        }
    </style>
@endpush

@push('script')
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="{{ asset('plugin/Sortable.min.js') }}"></script>
    <script src="{{ asset('js/sortablejs.js') }}"></script>
    {{-- <script src="{{ asset('js/dropify.min.js') }}"></script> --}}
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>


    <script>
        $(document).ready(function() {
            let num = 0;
            $(document).on('click', '#addButton', function() {
                num++;
                let featuredetails = $('input[name="featuredetails"]').val();
                let starter = $('input[name="starter"]').val();
                let standard = $('input[name="standard"]').val();
                let advanced = $('input[name="advanced"]').val();
                $('#simple-list').append(`
            <tr>
                <input type="hidden" name="featuredetails[]" value="${featuredetails}">
                <input type="hidden" name="starter[]" value="${starter}">
                <input type="hidden" name="standard[]" value="${standard}">
                <input type="hidden" name="advanced[]" value="${advanced}">
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"> ${num} </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"> ${featuredetails} </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"> ${starter} </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"> ${standard} </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200 flex justify-between items-center">
                    <span class="">${advanced}</span>
                    <span class="bg-red-500 p-1 rounded-full text-white cursor-pointer close-icon">x</span>
                </td>
            </tr>
            `);
                $('input[name="featuredetails"]').val('')
                $('input[name="starter"]').val('')
                $('input[name="standard"]').val('')
                $('input[name="advanced"]').val('')
            });

            $(document).on('click', '.close-icon', function() {
                $(this).parent().parent().remove();
            });
        });
    </script>
@endpush

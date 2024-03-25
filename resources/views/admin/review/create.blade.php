@extends('admin.layouts.app')
@section('breadcrumb')
    <x-breadcrumb pageone="Review" pageoneRoute="{{ route('review.index') }}" pagetwo="Create" />
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
                    <form action="{{ route('review.store') }}" method="POST" enctype="multipart/form-data"
                        class=" space-y-1">
                        @csrf
                        <div class="grid grid-cols-12 gap-5">
                            <div class="col-span-12 lg:col-span-8">
                                <x-form.input label="Buyer Name" name="name" />
                                <x-form.input label="Rating" name="rating" type="number" />
                                <x-form.input label="Review URL" type="text" name="review_url" type="text" />
                                <x-form.textarea label="Review Text" type="text" name="review" />

                            </div>
                            <div class="col-span-12 lg:col-span-4">
                                <x-form.input label="Review Date" name="date" type="date" />
                                <x-form.select label="Review Type" name="review_type_id" :data="$types" />
                                <x-form.select label="Select Category" name="category_id" :data="$categories" />
                                <x-form.select-status />
                                <x-form.thumbnail-single />
                            </div>
                        </div>

                        @include('admin.inc.modal.photo-gallery')
                        <x-form.submit-button />
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('style')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush



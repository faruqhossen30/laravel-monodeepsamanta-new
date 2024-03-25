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
    <div class="bg-white dark:bg-gray-800 dark:text-slate-400 p-2">
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <form action="{{ route('portfolio.update', $portfolio->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-12 gap-5">
                            <div class="col-span-12 lg:col-span-8">
                                <x-form.input label="Portfolio Title" name="title" value="{{ $portfolio->title }}" />
                                <x-form.select label="Select Category" name="category_id" :data="$categories"
                                    :id="$portfolio->category_id" />
                                <x-form.select-status :status="$portfolio->status" />
                            </div>
                            <div class="col-span-12 lg:col-span-4">
                                <x-form.thumbnail-single :thumbnail="$portfolio->thumbnail" />
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

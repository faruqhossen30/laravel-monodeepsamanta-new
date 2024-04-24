@extends('admin.layouts.app')
@section('breadcrumb')
<x-breadcrumb pageone="Slider" pageoneRoute="{{route('slider.index')}}" pagetwo="Create"  />
@endsection
@section('content')
<div class="flex flex-col gap-6 ">
	<div class="card">
		<div class="card-header">
		<div class="p-6">

			<form action="{{route('slider.update',$slider->id)}}" method="POST" enctype="multipart/form-data">
                @csrf

                @method('PUT')
                <div class="grid grid-cols-12 gap-5 ">
                    <div class="col-span-12 lg:col-span-8 bg-white dark:bg-gray-800 p-4 rounded-lg">
                        <x-form.input label="Slider" name="title" value="{{$slider->title}}" />

                    </div>
                    <div class="col-span-12 lg:col-span-4 bg-white dark:bg-gray-800 p-4 rounded-lg">
                        <div class="col-span-3 pt-1 space-y-2">
                            <label for="thumbnail"
                                class="text-gray-500 dark:text-gray-500 text-sm font-medium">Image</label>
                            <input name="photo" class="dropify" type="file" id="myDropify"
                                data-default-file="{{ asset('storage/' . $slider->photo) }}">
                        </div>
                    </div>

                </div>
				<x-form.submit-button title="Update" />
		</form>
	</div>
</div>
@endsection

@push('styles')


<link rel="stylesheet" href="{{ asset('css/dropify.min.css') }}">
<style>
    .dropify-message p {
        font-size: 24px
    }
</style>

@endpush

@push('scripts')
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

        });
    </script>
@endpush




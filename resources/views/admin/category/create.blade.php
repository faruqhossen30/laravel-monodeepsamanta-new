@extends('admin.layouts.app')
@section('breadcrumb')
<x-breadcrumb pageone="Category" pageoneRoute="{{route('category.index')}}" pagetwo="Create"  />
@endsection
@section('content')
<div class="flex flex-col gap-6 ">
	<div class="card">
		<div class="card-header">
		<div class="p-6">

			<form action="{{route('category.store')}}" method="POST">
                @csrf


                <div class="grid grid-cols-12 gap-5 ">
                    <div class="col-span-12 lg:col-span-8 bg-white dark:bg-gray-800 p-4 rounded-lg">
                        <x-form.input label="Category Name" name="name" />

                    </div>
                    <div class="col-span-12 lg:col-span-4 bg-white dark:bg-gray-800 p-4 rounded-lg">
                        <x-form.thumbnail-single />
                    </div>

                </div>


                @include('admin.inc.modal.photo-gallery')
				<x-form.submit-button />
		</form>
	</div>
</div>
@endsection

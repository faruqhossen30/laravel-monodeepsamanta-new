@extends('admin.layouts.app')
@section('breadcrumb')
    <x-breadcrumb pageone="Skill" pageoneRoute="{{ route('skill.index') }}" pagetwo="Create" />
@endsection
@section('content')
    <div class="flex flex-col gap-6 ">
        <div class="card">
            <div class="card-header">
                <div class="p-6">

                    <form action="{{ route('skill.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf


                        <div class="grid grid-cols-12 gap-5 ">
                            <div class="col-span-12 lg:col-span-12 flex bg-white dark:bg-gray-800 p-4 rounded-lg space-x-4">

                                <div class="">
                                    <input type="text" id="title" name="title"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="skill Name" />

                                </div>

                                <button type="button" id="addItemButton"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 18 21">
                                        <path
                                            d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                                    </svg>
                                    Add Item
                                </button>

                            </div>

                            <div class="col-span-12 lg:col-span-12 bg-white dark:bg-gray-800 p-4 rounded-lg">

                                <div id="itemListDiv" class=" space-x-2 space-y-2">

                                </div>
                            </div>

                        </div>
                        <x-form.submit-button />
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
            <script>
                $(document).on('click', '#addItemButton', function() {

                    let titleValue = $('input[name="title"]').val();

                    $('#itemListDiv').append(`
                    <div class="border inline-flex space-x-4 px-4 py-2 rounded-lg">
                        <input type="hidden" name="item[]" value="${titleValue}">
                        <span>${titleValue}</span>
                        <button class=" cursor-pointer text-red-600 removebutton" type="button">x</button>
                    </div>
                    `);
                    $('input[name="title"]').val('');
                });

                $(document).on('click', '.removebutton', function() {
                    // console.log('clicked');
                    $(this).parent().remove();
                });
            </script>
        @endpush

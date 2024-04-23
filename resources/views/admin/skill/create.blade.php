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
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                      </svg>

                                    Add Skill
                                </button>

                            </div>

                            <div class="col-span-12 lg:col-span-12 bg-white dark:bg-gray-800 p-4 rounded-lg">

                                <div id="itemListDiv" class=" space-x-2 space-y-2">

                                    @foreach ($skills as $skill)
                                        <div class="border dark:border-gray-600 inline-flex space-x-4 px-2 py-2 rounded-lg">
                                            <input type="hidden" name="item[]" value="{{ $skill->title }}">
                                            <span class="text-gray-900 dark:text-gray-400">{{ $skill->title }}</span>
                                            <button class=" cursor-pointer text-red-600 removebutton" type="button">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                  </svg>


                                            </button>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                        <x-form.submit-button />
                    </form>
                </div>
            </div>
        @endsection

        @push('styles')
        @endpush

        @push('scripts')
            <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
            <script src="{{ asset('plugin/Sortable.min.js') }}"></script>
            <script>
                var simpleList = document.querySelector("#itemListDiv");
                new Sortable(simpleList, {
                    animation: 150,
                    ghostClass: 'bg-light'
                });
            </script>
            <script>
                $(document).on('click', '#addItemButton', function() {
                    let titleValue = $('input[name="title"]').val();

                    $('#itemListDiv').append(`
                    <div class="border dark:border-gray-600 inline-flex space-x-4 px-2 py-2 rounded-lg">
                        <input type="hidden" name="item[]" value="${titleValue}">
                        <span class="text-gray-900 dark:text-gray-400">${titleValue}</span>
                        <button class=" cursor-pointer text-red-600 removebutton" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </button>
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

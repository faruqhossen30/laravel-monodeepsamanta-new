<x-setting.setting-master title="Chat Section Backgound Image Setting">

    <div class="p-4">
        <form action="{{ route('chatsection.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div
                class="flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl p-4 md:p-5 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                {{-- <input class="dropify" type="file" id="myDropify" name="thumbnail" value="{{ $testmonialvideo ?? '' }}">
                @isset($testmonialvideo)
                    <img class="img-thumbnail" style="width: 150px; height:100px; padding:5px"
                        src="{{ asset('storage/' . $testmonialvideo) }}" alt="sdfsdf">
                @endisset --}}

                <div class="col-span-3 pt-1 space-y-2">
                    <label for="thumbnail"
                        class="text-gray-500 dark:text-gray-500 text-sm font-medium">Image Size Must be 1240 x 240 Pixel</label>
                    <input name="thumbnail" class="dropify" type="file" id="myDropify"
                        data-default-file="{{ asset('storage/' . $testmonialvideo) }}">
                </div>
            </div>
            <x-form.submit-button />
        </form>
    </div>




    @push('style')
        <link rel="stylesheet" href="{{ asset('css/dropify.min.css') }}">
        <style>
            .dropify-message p {
                font-size: 24px
            }
        </style>
    @endpush

    @push('script')
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

</x-setting.setting-master>

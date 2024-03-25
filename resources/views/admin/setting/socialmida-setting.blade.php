<x-setting.setting-master title="Social Setting">

    <div class="p-4">
        <form action="{{ route('socialmedia.setting.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <x-form.input label="facebook_page_link" value="{{ $site->facebook_page_link }}" name="facebook_page_link" />


            <div>
                <label for="hs-search-box-with-loading-3"
                    class="block text-sm font-medium mb-2 dark:text-white">facebook_page_link</label>
                <div class="flex rounded-lg shadow-sm">
                    <span
                        class="px-4 inline-flex items-center min-w-fit rounded-s-md border border-e-0 border-gray-200 bg-gray-50 text-sm text-gray-500 dark:bg-gray-700 dark:border-gray-700 dark:text-gray-400"><svg
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-facebook" viewBox="0 0 16 16">
                            <path
                                d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                        </svg></span>
                    <input type="text" id="hs-search-box-with-loading-3" name="hs-search-box-with-loading-3"
                        class="  block w-full border-gray-200 shadow-sm rounded-0 text-sm focus:border-0 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 focus:outline-none focus:ring-0"
                        placeholder="Input search">
                </div>
            </div>
            <x-form.input label="facebook_group_link" value="{{ $site->twitter_link }}" name="twitter_link" />
            <x-form.input label="linkedin_link" value="{{ $site->linkedin_link }}" name="linkedin_link" />
            <x-form.input label="youtube_link" value="{{ $site->youtube_link }}" name="youtube_link" />
            <x-form.input label="intro_video_link" value="{{ $site->intro_video_link }}" name="intro_video_link" />

            <div>
                <x-form.submit-button />
            </div>
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

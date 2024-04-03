<x-setting.setting-master title="Chat Section Photo/Video Setting">

    <div class="p-4">
        <form action="" method="post">
            <div class="flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl p-4 md:p-5 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                Under Construction !!!
              </div>
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
            photoThubnail();
            videoThubnail();
            $(document).on('click', '#addImageButton', function() {
                $('#portfolioImageSection').append(
                    `
                    <div class="col-span-2 p-4 border lg:col-span-1">
                        <input class="imagePortfolio" type="file" id="imagePortfolio" name="portfolio_image[]">
                        <input type="text" name="captions[]" class="block w-full px-4 py-3 text-sm border-gray-200 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="Caption">
                    </div>
                `
                );
                imagePortfolio();
            });

            $(document).on('click', '#addVideoButton', function() {
                $('#portfolioImageSection').append(
                    `
                    <div class="col-span-2 p-4 border lg:col-span-1">
                        <input class="videoPortfolio" type="file" id="videoPortfolio" name="portfolio_video[]">
                        <input type="text" name="video_caption[]"
                            class="block w-full px-4 py-3 text-sm border-gray-200 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                            placeholder="Caption">
                    </div>
                `
                );
                videoPortfolio();
            });


            function photoThubnail() {
                $('.photoThumbnail').dropify({
                    messages: {
                        'default': 'Image file drop here or click',
                        'replace': 'Drag and drop or click to replace',
                        'remove': 'Remove',
                        'error': 'Ooops, something wrong happended.'
                    }
                });
            }

            function videoThubnail() {
                $('.videoThumbnail').dropify({
                    messages: {
                        'default': 'Video file drop here or click',
                        'replace': 'Drag and drop or click to replace',
                        'remove': 'Remove',
                        'error': 'Ooops, something wrong happended.'
                    }
                });
            }

            function videoPortfolio() {
                $('.videoPortfolio').dropify({
                    messages: {
                        'default': 'Video file drop here or click',
                        'replace': 'Drag and drop or click to replace',
                        'remove': 'Remove',
                        'error': 'Ooops, something wrong happended.'
                    }
                });
            }

            function imagePortfolio() {
                $('.imagePortfolio').dropify({
                    messages: {
                        'default': 'Image file drop here or click',
                        'replace': 'Drag and drop or click to replace',
                        'remove': 'Remove',
                        'error': 'Ooops, something wrong happended.'
                    }
                });
            }

        });
    </script>
    @endpush

</x-setting.setting-master>

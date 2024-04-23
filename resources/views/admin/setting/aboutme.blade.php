<x-setting.setting-master title="About me Setting">

    <div class="p-4">
        <form action="{{ route('setting.aboutme.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="">

                <label for="aboutme" class="block text-sm font-medium mb-2 dark:text-white">About Me</label>
                    <textarea name="aboutme" class="ckeditor" id="editor" cols="30" rows="10">{{ $site->aboutme }}
                    </textarea>
                    @error('aboutme')
                        <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                    @enderror

            </div>
            <x-form.submit-button />
        </form>
    </div>
    @push('styles')
        <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
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

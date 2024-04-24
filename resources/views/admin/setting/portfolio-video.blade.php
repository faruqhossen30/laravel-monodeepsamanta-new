<x-setting.setting-master title="Chat Section Photo/Video Setting">

    <div class="p-4">
        <form action="{{route('portfolio.Video.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="py-2">
                <x-form.textarea label="Portfolio ifrem" name="portfolio_video" value="{{$testmonialvideo}}" />
                @error('Portfolio')
                    <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                @enderror
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

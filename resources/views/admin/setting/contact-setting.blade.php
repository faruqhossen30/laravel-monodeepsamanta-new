
    <x-setting.setting-master title="Contact Setting">

        <div class="p-4">
            <form action="{{route('contact.setting.store')}}" method="post" enctype="multipart/form-data">
                @csrf

                <x-form.input label="address" value="{{ $site->address }}" name="address" />

                    <x-form.input label="email" value="{{ $site->email }}" name="email" />
                    <x-form.input label="telephone_no" value="{{ $site->telephone_no }}" name="telephone_no" />
                    <x-form.input label="mobile_no" value="{{ $site->mobile_no }}" name="mobile_no" />
                    <x-form.input label="instagram_link" value="{{ $site->instagram_link }}" name="instagram_link" />
                    <x-form.input label="facebook_link" value="{{ $site->facebook_link }}" name="facebook_link" />
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

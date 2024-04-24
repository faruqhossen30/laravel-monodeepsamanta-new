<x-setting.setting-master title="Website Setting">

    <div class="p-4">
        <form action="{{route('website.setting.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-12 gap-4 ">

                <div class="col-span-12 lg:col-span-4 p-2 shadow">
                    {{-- <h2>site</h2> --}}
                    {{-- <x-form.input label="Site title" value="{{$site->site_title}}" name="site_title" />
                    <x-form.input label="Working time" value="{{$site->site_title}}" value="{{$site->working_time}}"  name="working_time" />
                    <x-form.input label="working_day"value="{{$site->working_day}}"  name="working_day" />
                    <x-form.input label="info" value="{{$site->info}}" name="info" />
                    <div class="col-span-2 lg:col-span-1">
                        <div class="my-2 md:flex">
                            <input class="dropify" type="file" id="myDropify" value="{{$site->logo}}"  data-default-file="{{ asset('uploads/logo/' . $site->logo) }}"  name="logo">
                        </div>
                    </div> --}}
                 </div>
                <div class="col-span-12 lg:col-span-4 p-2 shadow">
                    {{-- <h2>Contract</h2> --}}
                 @include('admin.setting.contact-setting')
                </div>
                <div class="col-span-12 lg:col-span-4 p-2 shadow">
                   {{-- <h2>Social Media</h2> --}}
                  @include('admin.setting.inc.social-media')
                </div>

            </div>


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

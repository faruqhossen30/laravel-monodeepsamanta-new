@extends('layouts.app')
@section('title', 'Home Page')
@section('content')

    <div>
        <div>
            <h3 class="py-2 text-2xl font-bold">{{ $post->title }}</h3>
            <div class="flex py-2 space-x-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span>Monoedeep Samanta</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                </svg>
                <span>{{ $post->created_at->format('d M Y') }}</span>
            </div>
        </div>
        <div>
            <img src="{{ asset('storage/' . $post->thumbnail) }}" class="object-cover w-full max-h-80 " alt="">
        </div>
        <div class="flex justify-center mx-auto space-x-14 mt-[90px] ">

            <div class="flex-col hidden space-y-5 lg:flex ">
                <a href="https://www.behance.net/monodeepsamanta"
                    class="inline-flex  justify-center items-center w-14  h-14 text-center text-white hover:bg-primary bg-black hover:text-white hover:bg-[#FF003A] rounded-full focus:outline-none focus:ring-2  focus:ring-offset-2 focus:ring-offset-white transition dark:text-gray-500 dark:hover:text-gray-200 dark:hover:bg-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class=""w-6 h-6 lg:w-8 lg:h-8" width="20"
                        height="20" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                        <path
                            d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                    </svg>
                </a>

                <a href="https://www.behance.net/monodeepsamanta"
                    class="inline-flex justify-center items-center w-14  h-14 text-center text-white hover:bg-primary bg-black hover:text-white hover:bg-[#FF003A] rounded-full focus:outline-none focus:ring-2  focus:ring-offset-2 focus:ring-offset-white transition dark:text-gray-500 dark:hover:text-gray-200 dark:hover:bg-gray-800">

                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-twitter" viewBox="0 0 16 16">
                        <path
                            d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15" />
                    </svg>
                </a>

                <a href="https://www.behance.net/monodeepsamanta"
                    class="inline-flex justify-center items-center w-14  h-14  text-center text-white hover:bg-primary bg-black hover:text-white hover:bg-[#FF003A] rounded-full focus:outline-none focus:ring-2  focus:ring-offset-2 focus:ring-offset-white transition dark:text-gray-500 dark:hover:text-gray-200 dark:hover:bg-gray-800">

                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                        class="bi bi-linkedin" viewBox="0 0 16 16">
                        <path
                            d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401m-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4" />
                    </svg>
                </a>
            </div>

            <div class="max-w-2xl ">
                {!! $post->description !!}
                <div>
                    <p class="py-4 text-lg">Published: {{ $post->created_at->format('d M Y') }}</p>
                    <p class="py-6">Written by:</p>
                    <div class="flex space-x-4">
                        <img class="w-20 h-20" src="{{asset('img/pic.png')}}" alt="">
                        <div>
                            <h2>Monoedeep Samanta</h2>
                            <p class="text-lg leading-6 ">Monodeep Samanta, the leading UI/UX designer from UK. I am really good at what I do. Through design, I love to solve complex problems and build beautiful & relevant interfaces.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <x-section-blog />
    <x-section-chat />
    <div class=" py-14"></div>
@endsection

@push('style')
    <style>
        h1 {
            font-size: 40px;
        }

        h2 {
            font-size: 35px;
        }

        h3 {
            font-size: 30px;
        }
        h3 {
            font-size: 24px;
        }
        .table, table{
            width: 100%;
        }
        table, td, tr {
            border: 1px solid black;
            padding: 12px;
        }
        p{
            line-height: 1.9rem;
        }
    </style>
@endpush

@push('script')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/mixitup.min.js') }}"></script>
    <script>
        var mixer = mixitup('.mixingContainer');
    </script>
@endpush

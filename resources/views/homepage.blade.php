@extends('layouts.app')
@section('title', 'Dashboard & UX/UI Designer | Home')
@section('content')
    <section class="py-[30px]">
        <div class="flex flex-row items-center justify-between">
            <div class="flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path
                        d="M17.333 2.66732V13.6673H6.33301V2.66732H17.333ZM17.333 0.833984H6.33301C5.32467 0.833984 4.49967 1.65898 4.49967 2.66732V13.6673C4.49967 14.6757 5.32467 15.5007 6.33301 15.5007H17.333C18.3413 15.5007 19.1663 14.6757 19.1663 13.6673V2.66732C19.1663 1.65898 18.3413 0.833984 17.333 0.833984ZM9.54134 9.69815L11.0905 11.7698L13.3638 8.92815L16.4163 12.7507H7.24967L9.54134 9.69815ZM0.833008 4.50065V17.334C0.833008 18.3423 1.65801 19.1673 2.66634 19.1673H15.4997V17.334H2.66634V4.50065H0.833008Z"
                        fill="#FF003A"></path>
                </svg>
                <h1 class="text-lg lg:text-[26px] font-bold">Check Out My Portfolio</h1>
            </div>

            <a href="{{ route('portfoliopage') }}" class="flex items-center space-x-2 font-bold text-brand">
                <span class="text-[15px] leading-[15px]">See All Portfolios</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="#FF003A" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" data-slot="icon" class="w-4 h-4 font-bold">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                </svg>
            </a>
        </div>
    </section>
@endsection

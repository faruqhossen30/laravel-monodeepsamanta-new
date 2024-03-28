@extends('layouts.app')
@section('title', 'Dashboard & UX/UI Designer | About Me')
@section('content')
    <x-section-aboutme />
    <div class="mt-5 lg:mt-12">
        <x-section-chat />
    </div>
    <x-section-portfolio islink="true"  />
    {{-- <div class="py-4 lg:py-14"></div> --}}

@endsection

@push('style')
@endpush

@push('script')
@endpush

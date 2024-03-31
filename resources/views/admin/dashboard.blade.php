@php
    use App\Models\Portfolio\Portfolio;
    use App\Models\Service\Service;
    use App\Models\Review\Review;
    $totalportfolio = Portfolio::count();
    $totalservice = Service::count();
    $totalreviews = Review::where('status', true)->count();
@endphp

@extends('admin.layouts.app')
@section('breadcrumb')
    <x-breadcrumb />
@endsection
@section('content')
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 items-center gap-2 md:gap-6">
        <x-dashboard.dahsbordcard title="Portfilios" data="{{$totalportfolio}}" />
        <x-dashboard.dahsbordcard title="Services" data="{{$totalservice}}" />
        <x-dashboard.dahsbordcard title="Reviews" data="{{$totalreviews}}" />
    </div>
@endsection

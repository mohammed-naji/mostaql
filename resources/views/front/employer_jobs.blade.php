@extends('front.master')

@section('content')
<div class="container my-5 py-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            @include('front.layouts.sidebar-'.Auth::user()->type)
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Your Approved Jobs') }}</div>

                <div class="card-body">
                    @foreach ($jobs as $job)
                        <div class="card shadow mb-3">
                            <div class="card-body">
                                <h3>{{ $job->title }}</h3>
                                <p>{{ $job->description }}</p>
                                <span>{{ $job->duration }}</span> |
                                <span>{{ $job->price }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('front.master')

@section('content')
<div class="container my-5 py-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            {{-- @if (Auth::user()->type == 'employee')
                @include('front.layouts.sidebar1')
            @endif --}}
{{--
            @includeWhen(Auth::user()->type == 'employee', 'front.layouts.sidebar1')
            @includeWhen(Auth::user()->type == 'employer', 'front.layouts.sidebar2') --}}

            @include('front.layouts.sidebar-'.Auth::user()->type)


            {{-- @if (Auth::user()->type == 'employer')
                @include('front.layouts.sidebar2')
            @endif --}}

        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

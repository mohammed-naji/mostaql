@extends('front.master')

@section('content')
<div class="container my-5 py-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            @include('front.layouts.sidebar-'.Auth::user()->type)
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Your proposals for') }} {{ $job->title }}</div>

                <div class="card-body">
                    @foreach ($proposals as $prop)
                        <div class="card shadow mb-3">
                            <div class="card-body">
                                <h3>{{ $prop->user->name }}  </h3>
                                <p>{{ $prop->content }}</p>
                                <span>{{ $prop->duration }}</span> |
                                <span>{{ $prop->price }}</span>
                                <div class="mt-4">
                                    <a class="btn" href="#" onclick="return confirm('fdsfasd')">Accept</a>
                                </div>

                            </div>
                        </div>
                    @endforeach

                    {{ $proposals->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

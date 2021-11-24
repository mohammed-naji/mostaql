@extends('front.master')

@section('content')
<div class="container my-5 py-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            @include('front.layouts.sidebar-'.Auth::user()->type)
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Post a Job') }}</div>

                <div class="card-body">

                    @include('front.layouts.alert')

                    <form action="{{ route('employer.post_job') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Title" />
                            @error('title')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <textarea rows="5" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Description"></textarea>
                            @error('description')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control @error('duration') is-invalid @enderror" name="duration" placeholder="Duration" />
                            @error('duration')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" placeholder="Price" />
                            @error('price')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <button class="genric-btn primary btn-lg">Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

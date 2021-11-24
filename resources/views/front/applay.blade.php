@extends('front.master')

@section('title', $job->title . ' | ' . config('app.name'))

@section('content')
<main>

    <!-- Hero Area Start-->
    <div class="slider-area ">
    <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/about.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>{{ $job->title }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Hero Area End -->
    <!-- job post company Start -->
    <div class="job-post-company pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-12">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label>Proposal</label>
                            <textarea rows="5" name="content" class="form-control" placeholder="Your proposal..."></textarea>
                        </div>

                        <div class="mb-3">
                            <label>Duration</label>
                            <input type="text" name="duration" class="form-control" placeholder="Duration">
                        </div>

                        <div class="mb-3">
                            <label>Price</label>
                            <input type="text" name="price" class="form-control" placeholder="Price">
                        </div>

                        <button class="btn">Applay</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- job post company End -->

</main>
@stop

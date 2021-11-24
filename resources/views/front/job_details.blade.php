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
                <!-- Left Content -->
                <div class="col-xl-7 col-lg-8">
                    <!-- job single -->
                    <div class="single-job-items mb-30">
                        <div class="job-items">

                            <div class="job-tittle job-tittle2">
                                <a href="{{ route('site.job', $job->id) }}">
                                    <h4>{{ $job->title }}</h4>
                                </a>
                                <ul>
                                    @if ($job->skills->count())
                                        <li><i class="far fa-star"></i>{{ $job->skills->count() }}</li>
                                    @endif
                                    <li><i class="far fa-clock"></i>{{ $job->duration }}</li>
                                    <li><i class="fas fa-dollar-sign"></i>{{ $job->price }}$</li>
                                </ul>
                            </div>
                        </div>
                        <div class="items-link items-link2 f-right">
                            {{-- <span>{{ $job->created_at->format('Y - m - d') }}</span> --}}
                            <span>{{ $job->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                      <!-- job single End -->

                    <div class="job-post-details">
                        <div class="post-details1 mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Job Description</h4>
                            </div>
                            <p>{{ $job->description }}</p>
                        </div>
                    </div>

                </div>
                <!-- Right Content -->
                <div class="col-xl-4 col-lg-4">
                    <div class="post-details3  mb-50">
                        <!-- Small Section Tittle -->
                       <div class="small-section-tittle">
                           <h4>Job Overview</h4>
                       </div>
                      <ul>
                          <li>Posted date : <span> {{ $job->created_at->format('d M Y') }}</span></li>
                          <li>Salary :  <span>${{ $job->price }}</span></li>
                      </ul>
                     <div class="apply-btn2">
                        <a href="{{ route('site.job.applay', $job->id) }}" class="btn">Apply Now</a>
                     </div>
                   </div>
                    <div class="post-details4  mb-50">
                        <!-- Small Section Tittle -->
                       <div class="small-section-tittle">
                           <h4>Company Information</h4>
                       </div>
                          <span>{{ $job->user->name }}</span>
                        <ul>
                            <li>Name: <span>{{ $job->user->profile->name }} </span></li>
                            <li>Tax Number: <span>{{ $job->user->profile->tax_number }} </span></li>
                            <li>Address: <span>{{ $job->user->profile->address }} </span></li>
                            <li>Email: <span>{{ $job->user->profile->email }} </span></li>

                        </ul>
                   </div>
                </div>
            </div>
        </div>
    </div>
    <!-- job post company End -->

</main>
@stop

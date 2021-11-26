@extends('front.master')

@section('content')
<style>
    a {
        color: #28395a;
    }

    a:hover {
        color: #28395a;
    }
</style>
<div class="container my-5 py-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            @include('front.layouts.sidebar-'.Auth::user()->type)
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Messages') }}</div>

                <div class="card-body">

                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <a class="nav-link active" id="inbox-tab-tab" data-toggle="pill" href="#inbox-tab" role="tab" aria-controls="inbox-tab" aria-selected="true">Inbox</a>
                        </li>
                        <li class="nav-item" role="presentation">
                          <a class="nav-link" id="sent-tab-tab" data-toggle="pill" href="#sent-tab" role="tab" aria-controls="sent-tab" aria-selected="false">Sent</a>
                        </li>
                      </ul>
                      <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="inbox-tab" role="tabpanel" aria-labelledby="inbox-tab-tab">

                            <div class="list-group">
                                @forelse ($messagesin as $item)
                                    <a href="{{ route('employer.message_show', $item->id) }}" class="list-group-item list-group-item-action d-flex justify-content-between">
                                        <span>{{ $item->subject }}</span>
                                        <span>{{ $item->created_at->diffForHumans() }}</span>
                                    </a>
                                @empty
                                    <p>No Messages</p>
                                @endforelse
                            </div>

                        </div>
                        <div class="tab-pane fade" id="sent-tab" role="tabpanel" aria-labelledby="sent-tab-tab">

                            <div class="list-group">
                                @forelse ($messagesout as $item)
                                    <a href="{{ route('employer.message_show', $item->id) }}" class="list-group-item list-group-item-action d-flex justify-content-between">
                                        <span>{{ $item->subject }}</span>
                                        <span>{{ $item->created_at->diffForHumans() }}</span>
                                    </a>
                                @empty
                                    <p>No Messages</p>
                                @endforelse
                            </div>

                        </div>
                      </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

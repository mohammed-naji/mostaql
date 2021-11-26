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
                <div class="card-header">{{ $msg->subject }}</div>

                <div class="card-body">
                    {{ $msg->body }}

                    @if (Auth::id() != $msg->sender_id)
                    <hr>

                    <h3>Replay</h3>

                    <form action="{{ route('employer.message_replay', $msg->id) }}" method="POST">
                        @csrf

                        <textarea rows="5" class="form-control mb-3" name="body" placeholder="Replay..."></textarea>

                        <button class="btn">Replay</button>
                    </form>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Last tweets</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @forelse($tweets as $tweet)
                        <div class="card my-3">
                            <div class="card-body">
                                <p class="card-text">{{$tweet->content}}</p>
                                <p class="card-text text-right"><small class="text-muted"><a href="{{route('user', [$tweet->user->id])}}">{{ $tweet->user->name }}</a> - {{ $tweet->created_at->diffForHumans() }}</small></p>
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-info" role="alert">
                            {{ __('No tweet for the moment...') }}
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

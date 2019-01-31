@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$user->name}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @auth
                        @if (Auth::id() == $user->id)
                            <form action="/tweet" method="post" class="mb-4">
                                @csrf
                                <div class="form-group">
                                    <textarea class="form-control" rows="3" name="tweet" maxlength="255"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Tweet it !</button>
                            </form>
                        @endif
                    @endauth

                    @forelse($user->tweets as $tweet)
                        <div class="card my-3">
                            <div class="card-body">
                                <p class="card-text">{{$tweet->content}}</p>
                                <p class="card-text text-right"><small class="text-muted">{{ $tweet->created_at->diffForHumans() }}</small></p>
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

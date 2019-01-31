@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Users</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($users->chunk(4) as $chunk)
                        <div class="row my-3">
                            @foreach($chunk as $user)
                                <div class="col-sm-3">
                                    <div class="card text-center">
                                        <a href="{{route('user', [$user->id])}}"><img src="{{Gravatar::src($user->email)}}" class="card-img-top" alt="{{$user->name}}"></a>
                                        <div class="card-body">
                                            <a href="{{route('user', [$user->id])}}">{{$user->name}}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

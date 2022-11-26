@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mb-3">
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

            @if (Auth::user()->is_admin === 1)
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Details') }}</div>

                    <div class="card-body">
                        <a href="{{route('users')}}"><button class="btn btn-secondary">All Users</button></a>
                        <a href="{{route('add')}}"><button class="btn btn-secondary">Add User</button></a>

                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection

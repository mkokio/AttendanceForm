<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="antialiased">
    <!--
    <div class="container mt-4 text-center">
        @if (Route::has('login'))
            <div class="fixed-top p-3 text-end">
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-primary">Dashboard!</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-secondary ms-4">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    -->

        <x-app-layout>
            <x-slot name="header">
                <h2 class="fs-2 text-gray-800">
                    {{ __('ダッシュボード') }}
                </h2>
            </x-slot>

            <div class="container py-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title text-center">
                                    {{ __("Hello") }} {{ Auth::user()->name }}!
                                </h3>
                            </div>

                            <div class="card-body">
                                <p class="text-dark">
                                    This is your dashboard.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-app-layout>
    </div>
</body>
</html>

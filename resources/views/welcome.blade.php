<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Welcome</title>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        
    </head>
        <body class="antialiased">
            <div class="container d-flex flex-column justify-content-center align-items-center min-vh-100">
                @if (Route::has('login'))
                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                        @auth
                            <a href="{{ url('/attendanceforms') }}" class="btn btn-primary">{{ __('Attendance Form') }}</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary">{{ __('Log in') }}</a>
    
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-secondary ml-4">{{ __('Register') }}</a>
                            @endif
                        @endauth
                    </div>
                @endif
    
                
            </div>
        </body>
</html>

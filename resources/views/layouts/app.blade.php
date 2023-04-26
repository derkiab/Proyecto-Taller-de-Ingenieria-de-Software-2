<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <!-- Fonts -->
    <link href="https://fonts.cdnfonts.com/css/montserrat" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
        integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
    </script>

    <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.4/js/tether.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const calendarEl = document.getElementById('calendar')
            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth'
            })
            calendar.render()
        })
    </script>
</head>

<body>
    @guest
        <div class="container-fluid" id="login">
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    @else
        <div id="app" class="wrapper">
            @guest
            @else
                @include('layouts.sidebar')
                <div id=content>
                    @include('layouts.sidehead')
                    <main class="py-4">
                        @yield('content')
                    </main>
                </div>
            @endguest
            @yield('js_after')
        </div>

    @endguest

</body>

</html>

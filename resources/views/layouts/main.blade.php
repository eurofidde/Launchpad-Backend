<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') • Launchpad</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
</head>
<body>
    <header class="header">
        <div class="header__left">
            <strong>Launchpad</strong>
        </div>
        <div class="header__right">
            <div class="dropdown">
                <a>{{ Auth::user()->name }}</a>
                <div class="dropdown__content">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                </div>
            </div>
        </div>
    </header>
    <div class="sidebar-wrap">
        <aside class="sidebar">
            <a href="{{ url('/dashboard') }}">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
            <a href="{{ url('/versions') }}">
                <i class="fas fa-gavel"></i>
                <span>Versions</span>
            </a>
            <a href="{{ url('/branches') }}">
                <i class="fas fa-box"></i>
                <span>Branches</span>
            </a>
            <a href="{{ url('/uploads') }}">
                <i class="fas fa-cloud-upload-alt"></i>
                <span>Uploads</span>
            </a>
        </aside>
        <main class="sidebar-wrap__content">
            @yield('content')
        </main>
    </div>

    <!-- Logout Form -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
        @csrf
    </form>
    <!-- /Logout Form -->
</body>
</html>
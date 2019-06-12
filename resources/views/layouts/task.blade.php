<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CSV Exporter </title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>

<body>
<div class="c-level-task-menu">
    <div class="logo-wrap">
        <a href="{{route('index')}}" class="logo app-menu-logo">
            <img src="{{asset('images/logo_sm.png')}}" alt="Logo" title="logo">
        </a>
        <a href="{{route('index')}}" class="logotext app-menu-logo">
            CSV Exporter
        </a>
    </div>
    @if(\Illuminate\Support\Facades\Route::current()->getName() !== 'index')
        <div class="menu">
            <a href="{{route('students')}}">All Students</a>
            <a href="{{route('courses')}}">All Courses</a>

        </div>
    @endif
</div>

@yield('content')
</body>

<script src="{{asset('js/scripts.js')}}"></script>

</html>

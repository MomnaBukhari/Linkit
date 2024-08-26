<!DOCTYPE html>

<head>
    <title>Link♾️It</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="favicon.ico">
    @yield('css')
    @yield('pusherscript')
</head>

<body>
    <div class="NavBar">
        <div class="NavBar1">
            <a href="/">Link♾️It</a>
        </div>
        <div class="NavBar2">
            <a href="/">Home</a>
            <a href="/register">Join</a>
        </div>
    </div>
    @yield('content')
    @yield('script')
</body>

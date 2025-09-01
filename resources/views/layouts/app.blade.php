<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
</head>
<body>
    @include('layouts.partials.header')
    @include('layouts.partials.sidebar')

    <button class="mobile-toggle">☰</button>

    <div class="main-content">
        @yield('content')
    </div>

    @include('layouts.partials.footer')

    
</body>
</html>

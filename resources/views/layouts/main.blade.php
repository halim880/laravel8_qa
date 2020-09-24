<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.includes.head')
</head>
<body>
    @include('layouts.includes.header')
    
    @yield('content')

    @include('layouts.includes.bottom')
</body>
</html>
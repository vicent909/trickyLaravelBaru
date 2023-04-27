<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width , initial-scale=1.0">
    <title>@yield('title')</title>

    {{-- styles tambahan atas --}}
    @stack('prepend-style')
    {{-- style --}}
    @include('includes.style')
    {{-- style tambahan bawah --}}
    @stack('addon-style')

</head> 
<body> 
    
    {{-- navbar --}}
    @include('includes.navbar-alternate')
    
    {{-- content --}}
    @yield('content')

    {{-- script tambahan atas --}}
    @stack('prepend-script')

    {{-- script --}}
    @include('includes.script')

    {{-- script tambahan bawah --}}
    @stack('addon-script')
    
</body>
</html>
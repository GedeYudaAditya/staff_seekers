<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Staff Seekers | {{ $title }}</title>
    @include('villa.layouts._css')
</head>

<body>
    @include('villa.layouts._nav')

    {{-- <div class="container-fluid p-0">
        @yield('content')
    </div> --}}
    <div class="height-100 mt-5rem">
        @yield('content')
    </div>

    @include('villa.layouts._js')
</body>

</html>
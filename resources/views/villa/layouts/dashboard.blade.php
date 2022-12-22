<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Staff Seekers | {{ $title }} </title>
    @include('villa.layouts._css')
</head>

@include('villa.layouts._nav_dashboard')

<body id="body-pd" class="body-pd">
    {{-- @include('components.modals') --}}
    @include('villa.layouts._nav')

    {{-- Main content --}}
    <div class="height-100 mt-5rem">
        @yield('content')
    </div>
    {{-- End main content --}}

    @include('villa.layouts._js')
</body>

</html>
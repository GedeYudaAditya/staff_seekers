<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Staff Seekers | {{ $title }} </title>
    @include('admin.layouts._css')
</head>

<body id="body-pd" class="body-pd">
    @include('components.modals')
    @include('admin.layouts._nav')

    {{-- Main content --}}
    <div class="height-100 mt-5rem">
        @yield('content')
    </div>
    {{-- End main content --}}

    @include('admin.layouts._js')
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Staff Seekers | {{ $title }} </title>
    @include('guest.layouts._css')
</head>

<body class="pb-0">
    @include('guest.layouts._nav')

    <div class="container-fluid p-0">
        @yield('content')
    </div>

    @include('__footer')

    @include('guest.layouts._js')
</body>

</html>

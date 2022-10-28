<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Staff Seekers | {{ $title }}</title>
    @include('staff.layouts._css')
</head>

<body>
    @include('staff.layouts._nav')

    <div class="container">
        @yield('content')
    </div>

    @include('staff.layouts._js')
</body>

</html>

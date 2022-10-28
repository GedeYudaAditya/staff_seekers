<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<<<<<<< HEAD
    <title>Staff Seekers | {{ $title }} </title>
=======
    <title>Staff Seekers | {{ $title }}</title>
>>>>>>> origin/yuda
    @include('guest.layouts._css')
</head>

<body>
    @include('guest.layouts._nav')

    <div class="container">
        @yield('content')
    </div>

    @include('guest.layouts._js')
</body>

</html>
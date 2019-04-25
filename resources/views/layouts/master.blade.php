<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    <div>
        <div>
            @include('layouts.elements.header')
        </div>
            <section>
                @yield('content')
            </section>
        <div>
            @include('layouts.elements.footer')
        </div>
    </div>
</body>
</html>
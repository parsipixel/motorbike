<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Motorbikes</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>
<body>

@include('partials.header')

<div class="container">

    @include('partials.messages')

    @yield('content')

    @include('partials.footer')

</div>

{{-- Javascript --}}
<script src="{{ asset('assets/js/jquery-2.1.4.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>


</body>
</html>
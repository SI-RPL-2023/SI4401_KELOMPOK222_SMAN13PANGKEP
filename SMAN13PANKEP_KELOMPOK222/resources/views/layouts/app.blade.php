<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, intial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/bootstrap.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <title>{{ $title ?? 'Sekolah' }}</title>
    <style>
        .body {
            margin-top: 120px;
            margin-bottom: 100px;
        }
    </style>
    @stack('styles')
    @vite(['resources/app.css'])
</head>

<body>
    @include('layouts.partials.navbar')

    <div class="body">
        @yield('content')
    </div>
  @include('layouts.partials.toast')
    @include('layouts.partials.footer')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        const toastLiveExample = document.getElementById('liveToast')
        const toast = new bootstrap.Toast(toastLiveExample)
        toast.show()
    </script>
    @stack('scripts')
</body>

</html>

<html>
<head>
    @livewireStyles
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" type="text/css">
    <script src="{{ mix('js/app.js') }}"></script>
</head>
<body>
<div class="container-fluid">
    @yield('content')
@livewireScripts
    @show
</div>
</body>
</html>

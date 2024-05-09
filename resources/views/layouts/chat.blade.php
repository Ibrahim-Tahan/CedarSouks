<!DOCTYPE html>
<html>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Chatbot</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    @yield('css')

    <style>
        body {
            font-family:  sans-serif;
        }
    </style>
    <script src="{{ asset('js/app.js') }}"></script>

</head>
<body>

    <nav  class="navbar navbar-expand-md navbar-light absolute py-2 mb-4">
        @yield('navigation')
    </nav>


<div class="container">
    @yield('content')
</div>

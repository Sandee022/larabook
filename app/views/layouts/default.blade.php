<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css"/>
    <link rel='stylesheet' href='//fonts.googleapis.com/css?family=Roboto'>
    {{ HTML::style('css/main.css') }}
</head>
<body>
    @include('layouts.partials.nav')

    <div class="container">
        @include('flash::message')
        @yield('content')
    </div>
    <script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script>
        $('#flash-overlay-modal').modal();
        $('.comments_create-form').on('keydown', function(e)
        {
            if(e.keyCode == 13)
            {
                e.preventDefault();
                $(this).submit();
            }
        });
    </script>
</body>
</html>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script>
            function delete_flash(flash){
                $(flash).parent().remove()
            }
        </script>
    </head>
    <body>
        <div>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a href="" class="navbar-brand">online quiz</a>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-items"><a href="/join" class="nav-link">Home</a></li>
                    <li class="nav-items"><a href="/admin/create" class="nav-link">Create</a></li>
                    <li class="nav-items"><a href="/admin/library" class="nav-link">Library</a></li>
                </ul>
            </nav>
        </div>
        <div>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}<button class="close" onclick="delete_flash(this);">&times;</button></p>
                @endforeach
            @endif
            @yield('content')
        </div>
    </body>
</html>
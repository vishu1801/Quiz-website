<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
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
                    <li class="nav-items"><a href="join" class="nav-link">Home</a></li>
                    @if(Session::get('user'))
                    <li class="nav-items"><a href="" class="nav-link">Hi, {{Session::get('user')}}</a></li>
                    <li class="nav-items"><a href="logout" class="nav-link">Logout</a></li>
                    @else
                    <li class="nav-items"><a href="login" class="nav-link">Login</a></li>
                    <li class="nav-items"><a href="register" class="nav-link">Register</a></li>
                    @endif
                    @if(Session::get('used')=="teacher")
                    <li class="nav-items"><a href="admin" class="nav-link">Instructor Dashboard</a></li>
                    @endif
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
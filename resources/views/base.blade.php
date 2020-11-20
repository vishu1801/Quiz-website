<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap/4.5.3/dist/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap/4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js/1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap/4.5.3/dist/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <script>
            function delete_flash(flash){
                $(flash).parent().remove()
            }
        </script>
        <style>
            .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
            }
            .avatar {
            vertical-align: middle;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            }
            .avatar1 {
            vertical-align: middle;
            width: 100px;
            height: 140px;
            border-radius: 50%;
            }
        </style>
    </head>
    <body>
        <div>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a href="" class="navbar-brand">online quiz</a>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-items"><a href="join" class="nav-link">Home</a></li>
                    @if(Session::get('user'))
                    <li class="nav-item dropdown">
                        <a class="nav-link  dropdown-toggle" href="#" data-toggle="dropdown"><img src="/uploads/images/image.jpg" class="avatar"></a>
                        <ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="dLabel">
                            <li><a class="dropdown-item" href="profile">Hi, {{Session::get('user')}}</a></li>
                            <hr>
                            <li><a class="dropdown-item" href="profile">Your Profile</a></li>
                            <hr>
                            @if(Session::get('used')=="teacher")
                            <li><a class="dropdown-item" href="admin">Instructor Dashboard</a></li>
                            <hr>
                            @endif
                            <li><a class="dropdown-item" href="logout">Logout</a></li>
                        </ul>
                    </li>
                    @else
                    <li class="nav-items"><a href="login" class="nav-link">Login</a></li>
                    <li class="nav-items"><a href="register" class="nav-link">Register</a></li>
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
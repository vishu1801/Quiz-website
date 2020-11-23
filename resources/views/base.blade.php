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
        <script type="text/javascript" src="resources/js/password_text.js"></script>
        
        <script>
            function delete_flash(flash){
                $(flash).parent().remove()
            }
            function mouseoverPass_old(obj) {
                var obj = document.getElementById('oldPassword');
                obj.type = "text";
            }
            function mouseoverPass_new(obj) {
                var obj = document.getElementById('newPassword');
                obj.type = "text";
            }
            function mouseoverPass_confirm(obj) {
                var obj = document.getElementById('confirmPassword');
                obj.type = "text";
            }
            function mouseoutPass_old(obj) {
                var obj = document.getElementById('oldPassword');
                obj.type = "password";
            }
            function mouseoutPass_new(obj) {
                var obj = document.getElementById('newPassword');
                obj.type = "password";
            }
            function mouseoutPass_confirm(obj) {
                var obj = document.getElementById('confirmPassword');
                obj.type = "password";
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
            .right-inner-addon {
                position: relative;
            }

            .right-inner-addon input {
                padding-right: 30px;
            }

            .right-inner-addon i {
                position: absolute;
                right: 0px;
                padding: 40px 12px;
            }
        </style>
    </head>
    <body>
        <div>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a href="" class="navbar-brand">online quiz</a>
                <ul class="navbar-nav ml-auto">
                    @if(Auth::check())
                    <li class="nav-items"><a href="join" class="nav-link">Home</a></li>
                    <li class="nav-item dropdown">
                        @if(Auth::user()->image_url !="")
                            <a class="nav-link  dropdown-toggle" href="#" data-toggle="dropdown"><img src="/storage/uploads/images/images/{{Auth::user()->image_url}}" class="avatar"></a>
                        @else
                            <a class="nav-link  dropdown-toggle" href="#" data-toggle="dropdown"><img src="/storage/uploads/images/images/123.jpg" class="avatar"></a>
                        @endif
                        <ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="dLabel">
                            <li><a class="dropdown-item" href="profile">Hi, {{Auth::user()->name}}</a></li>
                            <hr>
                            <li><a class="dropdown-item" href="profile"><i class="fa fa-user-circle" aria-hidden="true"></i>  Your Profile</a></li>
                            <hr>
                            @if(Auth::user()->used_as=="teacher")
                            <li><a class="dropdown-item" href="admin"><i class="fa fa-dashcube" aria-hidden="true"></i>  Instructor Dashboard</a></li>
                            <hr>
                            @endif
                            <li><a class="dropdown-item" href="change_password"><i class="fa fa-key" aria-hidden="true"></i>  Change Password</a></li>
                            <hr>
                            <li><a class="dropdown-item" href="logout"><i class="fa fa-sign-out" aria-hidden="true"></i>  Logout</a></li>
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
            @if (Session::get('status'))
                <p class="alert alert-success">{{ Session::get('status') }}<button class="close" onclick="delete_flash(this);">&times;</button></p>
            @endif
            @if (Session::get('danger'))
                <p class="alert alert-danger">{{ Session::get('danger') }}<button class="close" onclick="delete_flash(this);">&times;</button></p>
            @endif
            @yield('content')
        </div>
    </body>
</html>
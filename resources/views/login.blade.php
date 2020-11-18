@extends('base')
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login</title>

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
        @section('content')
            <div class="col-sm-6">
                <form action="login" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" placeholder="Email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Password" name="password" class="form-control">
                    </div>
                    <button type="submit">Login</button>
                </form>
            <div>
        @stop
    </body>
</html>

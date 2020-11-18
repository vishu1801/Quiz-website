@extends('base')
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Register</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
    </head>
    <body>
        @section('content')
            <div class="col-sm-6">
                <form action="register" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" placeholder="firstname" name="fname" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="lastname" name="lname" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Password" name="password1" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Re-Type Password" name="password2" class="form-control">
                    </div>
                    <div class="form-group">
                        <select name="used" class="form-control">
                            <option>--------</option>
                            <option value="teacher">Teacher</option>
                            <option Value="student">Student</option>
                        </select>
                    </div>
                    <button type="submit">Register</button>
                </form>
            <div>
        @stop
    </body>
</html>

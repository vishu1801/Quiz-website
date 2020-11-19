@extends('base')
<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
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
                        <input type="password" placeholder="Password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Re-Type Password" name="password_confirmation" class="form-control">
                    </div>
                    <div class="form-group">
                        <select name="used" class="form-control">
                            <option>--------</option>
                            <option value="teacher">Teacher</option>
                            <option Value="student">Student</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            <div>
        @stop
    </body>
</html>

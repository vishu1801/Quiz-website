@extends('base')
<html>
    <head>
        <title>Profile</title>
    </head>
    <body>
        @section('content')
            <div class="panel">
                <div class="panel-heading" style="background-color:	#DCDCDC; height:200px">
                    <img src="/uploads/images/image.jpg" class="avatar1 center py-3" class="">
                    <p style="text-align: center;" class="py-1">Welcome, {{Session::get('user_email')}}</p>
                </div>
            </div>
            <div>
                <form class="col-6 ml-auto mr-auto" action="update" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Firstname:</label>
                        <input type="text" value="{{Session::get('user')}}" class="form-control" name="firstname">
                    </div>
                    <div class="form-group">
                        <label>Lastname:</label>
                        <input type="text" value="{{$user[0]->lastname}}" class="form-control" name="lastname">
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="text" value="{{Session::get('user_email')}}" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label>Account Type:</label>
                        <input type="text" disabled value="{{$user[0]->used_as}}" class="form-control">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success form-control col-3">Update</button>
                    </div>
                </form>
            </div>
        @stop
    </body>
</html>
@extends('base')
<html>
    <head>
        <title>Profile</title>
    </head>
    <body>
        @section('content')
            <div class="panel">
                <div class="panel-heading" style="background-color:	#DCDCDC; height:200px">
                    @if(Auth::user()->image_url != "")
                        <img src="/storage/uploads/images/images/{{Auth::user()->image_url}}" class="avatar1 center py-3" class="">
                    @else
                        <img src="/storage/uploads/images/images/123.jpg" class="avatar1 center py-3" class="">
                    @endif
                    <p style="text-align: center;" class="py-1">Welcome, {{Auth::user()->email}}</p>
                </div>
            </div>
            <div>
                <form class="col-6 ml-auto mr-auto" action="update" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Firstname:</label>
                        <input type="text" value="{{Auth::user()->name}}" class="form-control" name="firstname">
                    </div>
                    <div class="form-group">
                        <label>Lastname:</label>
                        <input type="text" value="{{Auth::user()->lastname}}" class="form-control" name="lastname">
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="text" value="{{Auth::user()->email}}" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label>Account Type:</label>
                        <input type="text" disabled value="{{Auth::user()->used_as}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Change your Profile Photo:</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success form-control col-3">Update</button>
                    </div>
                </form>
            </div>
        @stop
    </body>
</html>
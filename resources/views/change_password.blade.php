@extends('base')
<html>
    <head>
        <title>Change Your Password</title>
        <script>
            
        </script>
        <style>
            
        </style>
    </head>
    <body>
        @section('content')
            <form action="password_update" method="post" class="col-sm-6 col-md-5 ml-auto mr-auto">
                @csrf
                <div class="form group">
                    <div class="right-inner-addon">
                        <label>Old Password:</label>
                        <i class="fa fa-eye-slash" onmouseover="mouseoverPass_old();" onmouseout="mouseoutPass_old();"></i>
                        <input type="password" class="form-control" id="oldPassword" name="oldpassword">
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="right-inner-addon">
                        <label>New Password:</label>
                        <i class="fa fa-eye-slash" onmouseover="mouseoverPass_new();" onmouseout="mouseoutPass_new();"></i>
                        <input type="password" class="form-control" id="newPassword" name="password">
                    </div>
                </div>

                <div class="form-group">
                    <div class="right-inner-addon">
                        <label>Confirm Password:</label>
                        <i class="fa fa-eye-slash" onmouseover="mouseoverPass_confirm();" onmouseout="mouseoutPass_confirm();"></i>
                        <input type="password" class="form-control" id="confirmPassword" name="password_confirmation">
                    </div>
                </div>
                <div>
                    <button class="btn btn-success form-control">Update</button>
                </div>
            </form>
        @stop
    </body>
</html>
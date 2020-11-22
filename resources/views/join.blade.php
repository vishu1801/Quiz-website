@extends('base')
<html>
    <head>
        <title>Enter the code</title>
        <style> 
        .input-icons i { 
            position: absolute; 
        } 
          
        .input-icons { 
            width: 100%; 
            margin-bottom: 10px; 
        } 
          
        .icon { 
            padding: 10px; 
            min-width: 40px; 
        } 
          
        .input-field { 
            width: 100%; 
            padding: 10px; 
            text-align: center;
        } 
        </style> 
    </head>
    <body>
        @section('content')
            <form action="" class="col-6 ml-auto mr-auto">
                <div class="form-group input-icons">
                    <i class="fa fa-ticket icon" aria-hidden="true"></i>
                    <input type="text" placeholder="Enter the code" name="code" class="form-control input-field">
                </div>
                <button type="submit" class="btn btn-success form-control col-4">Enter</button>
            </form>
        @stop
    </body>
</html>
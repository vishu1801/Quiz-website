@extends('base')
<html>
    <head>
        <title>Enter the code</title>
    </head>
    <body>
        @section('content')
            <form action="" class="col-6 ml-auto mr-auto">
                <div class="form-group">
                    <input type="text" placeholder="Enter the code" name="code" class="form-control">
                </div>
                <button type="submit" class="btn btn-success form-control col-4">Enter</button>
            </form>
        @stop
    </body>
</html>
@extends('base')
<html>
    <head>
        <title>Enter the code</title>
    </head>
    <body>
        @section('content')
            <form action="">
                <input type="text" placeholder="Enter the code" name="code">
                <button type="submit">Enter</button>
            </form>
        @stop
    </body>
</html>
@extends('admin\base')
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Admin</title>
    </head>
    <body>
        @section('content')
            <form action="" method="post">
                @csrf
                <input type="text" placeholder="Your Question" name="question">
                <input type="text" placeholder="First Option" name="option-I">
                <input type="text" placeholder="Second Option" name="option-II">
                <input type="text" placeholder="Third Option" name="option-III">
                <input type="text" placeholder="Fourth Option" name="option-IV">
                <input type="text" placeholder="Enter the correct answer" name="answer">
                <button tyoe="submit" class="btn btn-success">Save</button>
                <button type="cancel" class="btn btn-dangers">Cancel</button>
            </form>
        @stop
    </body>
</html>
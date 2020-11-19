@extends('admin\base')
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Admin</title>
        
    </head>
    <body>
        @section('content')
            <h1>Create a new quiz</h1>
            <form action="/admin/create" method="post" entype="multipart/form-data">
                @csrf
                <div>
                    <label>Name Of The Quiz</label>
                    <input type="text" name="quiz_title">
                </div>
                <div>
                    <label>Description (optional)</label>
                    <input type="text" name="quiz_description">
                </div>
                <div>
                    <label>Image of Quiz (optional)</label>
                    <input type="file" name="quiz_image">
                </div>
                <button type="submit">Next</button>
            </form>
        @stop
    </body>
</html>
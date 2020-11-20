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
            <h1 style="text-align: center">Create a new quiz</h1>
            <form class="ml-auto mr-auto col-6"action="/admin/create" method="post" entype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Name Of The Quiz</label>
                    <input type="text" name="quiz_title" class="form-control">
                </div>
                <div class="form-group">
                    <label>Description (optional)</label>
                    <input type="text" name="quiz_description" class="form-control">
                </div>
                <div class="form-group">
                    <label>Image of Quiz (optional)</label>
                    <input type="file" name="quiz_image" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary form-control">Next</button>
            </form>
        @stop
    </body>
</html>
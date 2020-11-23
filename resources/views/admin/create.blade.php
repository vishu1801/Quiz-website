@extends('admin\base')
<html>
    <head>
        <title>Admin</title>
    </head>
    <body>
        @section('content')
            <h1 style="text-align: center">Create a new quiz</h1>
            <form class="ml-auto mr-auto col-6" action="/admin/create" method="post" enctype="multipart/form-data">
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
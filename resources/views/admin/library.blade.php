@extends('admin\base')
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Library</title>
    </head>
    <body>
        @section('content')
        <div class="container">
            <div class="row">
                    @foreach($quiz as $i)
                        <div class="col-sm-6 col-md-4">
                            <div class="card" style="width: 18rem;">
                                @if($i->quiz_image=="")
                                    <img class="card-img-top" src="/uploads/images/image.jpg" height="150" width="150" alt="Card image cap">
                                @else
                                    <img class="card-img-top" src="/uploads/images/{{$i->quiz_image}}" height=150" width="150" alt="Card image cap">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{$i->quiz_title}}</h5>
                                    <p class="card-text">{{$i->quiz_description}}</p>
                                    <p class="card-text">-By {{$i->users->name}} {{$i->users->lastname}}</p>
                                    <a href="/admin/question/{{$i->quiz_title}}" class="btn btn-primary">Edit</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @stop
    </body>
</html>
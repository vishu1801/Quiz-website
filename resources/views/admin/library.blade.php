@extends('admin\base')
<html>
    <head>
        <title>Library</title>
    </head>
    <body>
        @section('content')
        <div class="container">
            <div class="row">
                    @foreach($quiz as $i)
                        <div class="my-3 col-sm-12 col-md-4">
                            <div class="card" style="width: 18rem;">
                                @if($i->quiz_image=="")
                                    <img class="card-img-top" src="/storage/uploads/images/images/123.jpg" height="150" width="150" alt="Card image cap">
                                @else
                                    <img class="card-img-top" src="/storage/uploads/images/images/{{$i->quiz_image}}" height=150" width="150" alt="Card image cap">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{$i->quiz_title}}</h5>
                                    <p class="card-text">{{$i->quiz_description}}</p>
                                    <p class="card-text">-By {{$i->users->name}} {{$i->users->lastname}}</p>
                                    <a href="/admin/question/{{$i->quiz_title}}" class="btn btn-primary">Edit</a>
                                    <a href="/playlive/{{$i->quiz_title}}" class="btn" style="background: #800080; color:#FFFFFF"><i class="fa fa-play" aria-hidden="true"></i>   Play Live</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @stop
    </body>
</html>
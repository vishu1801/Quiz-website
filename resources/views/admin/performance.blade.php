<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Performance</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            .box{
                width: 300px;
                height: 60px;
                border-width: thick;
                border-style: solid;
            }
        </style>
    </head>
    <body style=" background-color: grey;">
        <div>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a href="" class="navbar-brand">Online Quiz</a>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-items"><a href="/teacher_end/{{$game}}" class="nav-link" style="font-size: 20px;">End Game</a></li>
                    <li class="nav-items"><button class="nav-link btn btn-primary" style="font-size: 20px;"> 🎀  {{$code}}  🎀</button></li>
                </ul>
            </nav>
        </div>
        <div class="box border-6 rounded ml-auto mr-auto my-4 ">
            <p class="text-center text-light" style="font-size:30px;">Game is live:</p>
        </div>
        <div class="container my-5">
            <div class="row">
                @foreach ($live as $students)
                    <div class="col-sm-6 col-md-3 my-2">
                        <div class="box rounded" style="width: 250px; height: 70px;">
                           <p class="m-2" style="font-size:25px; text-transform:capitalize;">{{$students->users->name}} {{$students->users->lastname}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </body>
</html>

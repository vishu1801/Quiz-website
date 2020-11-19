@extends('admin\base')
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Admin</title>
    </head>
    <body>
        @section('content')
            <form action="/admin/question/{{$game}}" method="post">
                @csrf
                <div>
                    <input type="text" placeholder="Your Question" name="question">
                </div>
                <div>
                    <input type="text" placeholder="First Option" name="option-I">
                </div>
                <div>
                    <input type="text" placeholder="Second Option" name="option-II">
                </div>
                <div>
                    <input type="text" placeholder="Third Option" name="option-III">
                </div>
                <div>
                    <input type="text" placeholder="Fourth Option" name="option-IV">
                </div>
                <div>
                    <input type="text" placeholder="Enter the correct answer" name="answer">
                </div>
                <div>
                    <button type="cancel" class="btn btn-dangers">Cancel</button>
                    <button tyoe="submit" class="btn btn-success">Save</button>
                </div>
            </form>
            @if(!empty($question))
                @foreach ($question as $quiz)
                    <div class="container px-1">
                        <div class="panel panel-default" style="border-style:solid">
                            <div class="panel-heading" style="background-color:	#DCDCDC" >Question {{$loop->iteration}} 
                                <a href="" style="color: #000000" class="float-right px-2"><i class="fa fa-pencil" style="font-size:25px"></i></a>
                                <a href="" style="color: #000000" class="float-right"><i class="fa fa-trash-o" style="font-size:25px"></i></a>
                            </div>
                            <div class="panel-body">{{$quiz->question}}</div>
                            @if($quiz->option_I!="")
                                <div class="panel-body">A. {{$quiz->option_I}}</div>
                            @endif
                            @if($quiz->option_II!="")
                                <div class="panel-body">B. {{$quiz->option_II}}</div>
                            @endif
                            @if($quiz->option_III!="")
                                <div class="panel-body">C. {{$quiz->option_III}}</div>
                            @endif
                            @if($quiz->option_IV!="")
                                <div class="panel-body">D. {{$quiz->option_IV}}</div>
                            @endif
                            <div class="panel-body">Correct Answer. {{$quiz->answer}}</div>
                        </div>
                    </div>
                    <div class="py-2"></div>
                @endforeach
            @endif

        @stop
    </body>
</html>
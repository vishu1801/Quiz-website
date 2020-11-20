@extends('admin\base')
<html>
    <head>
        <title>Admin</title>
    </head>
    <body>
        @section('content')
            <form class="col-5 ml-auto mr-auto" action="/admin/question/{{$game}}" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" placeholder="Your Question" name="question" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" placeholder="First Option" name="option-I" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Second Option" name="option-II" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Third Option" name="option-III" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Fourth Option" name="option-IV" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Enter the correct answer" name="answer" class="form-control">
                </div>
                <div>
                    <button tyoe="submit" class="btn btn-success form-control">Add</button>
                </div>
            </form>
            @if(!empty($question))
                @foreach ($question as $quiz)
                    <div class="container px-1">
                        <div class="panel panel-default" style="border-style:solid">
                            <div class="panel-heading" style="background-color:	#DCDCDC" >Question {{$loop->iteration}} 
                                <a href="{{$game}}/{{$quiz->id}}" style="color: #000000" class="float-right px-2"><i class="fa fa-pencil" style="font-size:25px"></i></a>
                                <a href="delete/{{$game}}/{{$quiz->id}}" style="color: #000000" class="float-right"><i class="fa fa-trash-o" style="font-size:25px"></i></a>
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
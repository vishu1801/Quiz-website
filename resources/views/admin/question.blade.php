@extends('admin\base')
<html>
    <head>
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
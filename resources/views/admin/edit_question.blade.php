@extends('admin\base')
<html>
    <head>
        <title>Admin</title>
    </head>
    <body>
        @section('content')
            <form action="{{$ques[0]->id}}" method="post">
                @csrf
                <div class="form-group col-6 ml-auto mr-auto">
                    <label>Question:</label>
                    <input type="text" value="{{$ques[0]->question}}" class="form-control" name="question">
                </div>
                <div class="form-group col-6 ml-auto mr-auto">
                    <label>Option-I:</label>
                    <input type="text" value="{{$ques[0]->option_I}}" class="form-control" name="option_I">
                </div>
                <div class="form-group col-6 ml-auto mr-auto">
                    <label>Option-II:</label>
                    <input type="text" value="{{$ques[0]->option_II}}" class="form-control" name="option_II">
                </div>
                <div class="form-group col-6 ml-auto mr-auto">
                    <label>Option-III:</label>
                    <input type="text" value="{{$ques[0]->option_III}}" class="form-control" name="option_III">
                </div>
                <div class="form-group col-6 ml-auto mr-auto">
                    <label>Option-IV:</label>
                    <input type="text" value="{{$ques[0]->option_IV}}" class="form-control" name="option_IV">
                </div>
                <div class="form-group col-6 ml-auto mr-auto">
                    <label>Answer:</label>
                    <input type="text" value="{{$ques[0]->answer}}" class="form-control" name="answer">
                </div>
                <div class="form-group col-6 ml-auto mr-auto">
                    <button type="button" class="btn">Cancel</button>
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        @stop
    </body>
</html>

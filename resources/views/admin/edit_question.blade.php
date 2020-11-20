@extends('admin\base')
<html>
    <head>
        <title>Admin</title>
    </head>
    <body>
        @section('content')
            <form class="col-6 mr-auto ml-auto" action="{{$ques[0]->id}}" method="post">
                @csrf
                <div class="form-group">
                    <label>Question:</label>
                    <input type="text" value="{{$ques[0]->question}}" class="form-control" name="question">
                </div>
                <div class="form-group">
                    <label>Option-I:</label>
                    <input type="text" value="{{$ques[0]->option_I}}" class="form-control" name="option_I">
                </div>
                <div class="form-group">
                    <label>Option-II:</label>
                    <input type="text" value="{{$ques[0]->option_II}}" class="form-control" name="option_II">
                </div>
                <div class="form-group">
                    <label>Option-III:</label>
                    <input type="text" value="{{$ques[0]->option_III}}" class="form-control" name="option_III">
                </div>
                <div class="form-group">
                    <label>Option-IV:</label>
                    <input type="text" value="{{$ques[0]->option_IV}}" class="form-control" name="option_IV">
                </div>
                <div class="form-group">
                    <label>Answer:</label>
                    <input type="text" value="{{$ques[0]->answer}}" class="form-control" name="answer">
                </div>
                <div>
                    <button type="submit" class="btn btn-success form-control">Update</button>
                    <button type="cancel" class="btn form-control">Cancel</button>
                </div>
            </form>
        @stop
    </body>
</html>

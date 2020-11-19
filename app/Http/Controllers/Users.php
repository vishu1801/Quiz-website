<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use App\Models\Question;
use App\Models\CreateQuiz;
use App\Http\Controllers\Users;
use Auth;
use Session;
use Crypt;


class Users extends Controller
{
    //
    public function register(Request $req){
        $req->validate([
            'fname'=>'required|max:255',
            'lname'=>'required|max:255',
            'email'=>'required|email|max:255|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'used'=>'required',
        ]);
        $user=new User;
        $user->name=$req->input('fname');
        $user->lastname=$req->input('lname');
        $user->email=$req->input('email');
        $user->password=Crypt::encrypt($req->input('password'));
        $user->used_as=$req->input('used');
        $user->save();
        return redirect('/login');
    }

    public function login(Request $req){
        $req->validate([
            'email'=>'required|exists:users,email|email',
            'password'=>'required',
        ]);
        $user=User::where("email",$req->input('email'))->get();
        if($req->input('password')==Crypt::decrypt($user[0]->password))
        {
            $req->session()->put('user', $user[0]->name);
            $req->session()->put('used', $user[0]->used_as);
            $req->session()->put('user_id', $user[0]->id);
            return redirect('/join');
        }else{
            $req->session()->flash('error','password is wrong');
            return redirect('/login');
        }
    }

    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect('/');
    }

    public function create_quiz(Request $req){
        $req->validate([
            'quiz_title'=>'required',
        ]);
        $createquiz=new CreateQuiz;
        $createquiz->user_id=Session::get('user_id');
        $createquiz->quiz_title=$req->input('quiz_title');
        $createquiz->quiz_description=$req->input('quiz_description');
        $createquiz->save();

        //$id = Auth::user()->id;
        //print_r($id);
        return redirect()->action([Users::class,'read_question'],[$req->input('quiz_title')]);
    }

    public function library(Request $req){
        $quiz=CreateQuiz::where("user_id",Session::get('user_id'))->with('users')->get();
        return view('admin\library')->with('quiz',$quiz);
    }

    public function read_question(Request $req,$game){
        $quiz=CreateQuiz::where("user_id",Session::get('user_id'))->where("quiz_title",$game)->get();
        $question=Question::where("quiz_id",$quiz[0]->id)->get();
        return view('admin\question')->with('game',$game)->with('question',$question);
    }

    public function save_question(Request $req,$game){
        $req->validate([
            'question' => 'required|max:255',
            'answer' => 'required|max:255',
        ]);
        $quiz=CreateQuiz::where("user_id",Session::get('user_id'))->where("quiz_title",$game)->get();
        $save = new Question;   
        $save->quiz_id=$quiz[0]->id;
        $save->question=$req->input('question');
        $save->option_I=$req->input('option-I');
        $save->option_II=$req->input('option-II');
        $save->option_III=$req->input('option-III');
        $save->option_IV=$req->input('option-IV');
        $save->answer=$req->input('answer');
        $save->save();

        return redirect()->action([Users::class,'read_question'],[$game]);
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use App\Models\Question;
use App\Models\CreateQuiz;
use App\Models\Live;
use App\Http\Controllers\Users;
use DB;
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
            $req->session()->put('user_email', $user[0]->email);
            $req->session()->put('user_id', $user[0]->id);
            return redirect('/join');
        }else{
            $req->session()->flash('status','The given password is wrong');
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
        $quiz=CreateQuiz::where('user_id',Session::get('user_id'))->where('quiz_title',$req->input('quiz_title'))->get();
        if(empty($quiz)){

            $createquiz=new CreateQuiz;
            $createquiz->user_id=Session::get('user_id');
            $createquiz->quiz_title=$req->input('quiz_title');
            $createquiz->quiz_description=$req->input('quiz_description');
            $createquiz->save();
        }else{
            $req->session()->flash('status','You have already taken the same quiz title.');
            return redirect('/admin/create');
        }

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

    public function profile(Request $req){
        $user=User::where("id",Session::get('user_id'))->get();
        return view('profile')->with('user',$user); 
    }

    public function update(Request $req){
        $req->validate([
            'firstname'=>'required|max:255',
            'lastname'=>'required|max:255',
            'email'=>'required|email|max:255',
        ]);
        $update=User::where('id',Session::get('user_id'))->update(['name'=>$req->input('firstname'),
                                                                'lastname'=>$req->input('lastname'),
                                                                'email'=>$req->input('email')]);
        return redirect('profile');
    }

    public function question_edit(Request $req, $game, $ques_id ){
        $ques= Question::where('id',$ques_id)->get();
        return view('admin\edit_question')->with('ques',$ques);
    }

    public function question_update(Request $req,$game,$ques_id){
        $req->validate([
            'question'=>'required|max:255',
            'answer'=>'required|max:255'
        ]);
        $ques=Question::where('id',$ques_id)->update(['question'=>$req->input('question'),
                                        'option_I'=>$req->input('option_I'),
                                        'option_II'=>$req->input('option_II'),
                                        'option_III'=>$req->input('option_III'),
                                        'option_IV'=>$req->input('option_IV'),
                                        'answer'=>$req->input('answer')]);
        return redirect()->action([Users::class,'read_question'],[$game]);
    }

    public function question_delete(Request $req,$game,$ques_id){
        $ques=Question::where('id',$ques_id)->delete();
        return redirect()->action([Users::class,'read_question'],[$game]);
    }

    public function playlive(Request $req,$game){
        $random=rand(10000,99999);
        $create=CreateQuiz::where('quiz_title',$game)->where('user_id',Session::get('user_id'))->update(['code'=>$random,
                                                                                                        'counter'=>0]);
        return redirect('live/'. $game . '/'. $random);
    }

    public function live(Request $req,$game,$code){
        $quiz_id=CreateQuiz::where('quiz_title',$game)->where('user_id',Session::get('user_id'))->get();
        $live=Live::where('quiz_id',$quiz_id[0]->id)->with('createquiz')->with('users')->get();
        return view('admin\live')->with(['game'=>$game,'code'=>$code, 'live'=>$live]);
    }
}

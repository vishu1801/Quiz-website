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
use Illuminate\Support\Facades\Hash;

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
        $user->password=Hash::make($req->input('password'));
        $user->used_as=$req->input('used');
        $user->save();
        Auth::login($user);
        return redirect('/login');
    }

    public function login(Request $req){
        $req->validate([
            'email'=>'required|exists:users,email|email',
            'password'=>'required',
        ]);
        $user=User::where("email",$req->input('email'))->get();
        if(Hash::check($req->input('password'),$user[0]->password))
        {
            $credentials=$req->only('email','password');
            if(Auth::attempt($credentials)){
                return redirect('/join');
            }else{
                $req->session()->flash('status','Some internet issues. Please login again.');
                return redirect('/login');
            }
        }else{
            $req->session()->flash('danger','The given password is wrong');
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
        $quiz=CreateQuiz::where('user_id',Auth::user()->id)->where('quiz_title',$req->input('quiz_title'))->get();
        if($quiz->isEmpty()){

            $createquiz=new CreateQuiz;
            $createquiz->user_id=Auth::user()->id;
            $createquiz->quiz_title=$req->input('quiz_title');
            $createquiz->quiz_description=$req->input('quiz_description');
            if($req->hasFile('quiz_image')){
                $req->validate([
                    'quiz_image'=>'mimes:jpeg,png,jpg|required|max:5000',
                ]);
                $filename=$req->quiz_image->getClientOriginalName();
                $without_extension=explode('.',$filename);
                $modified_filename=$without_extension[0] . time() . '.' . $without_extension[1];
                $req->quiz_image->storeAs('images',$modified_filename,'public');
                $createquiz->quiz_image=$modified_filename;               

            }
            $createquiz->save();
            // return redirect('admin/question/' . $req->input('quiz_title'));
            return redirect()->action([Users::class,'read_question'],[$req->input('quiz_title')]);
        }else{
            $req->session()->flash('status','You have already taken the same quiz title.');
            return redirect('/admin/create');
        }

        //$id = Auth::user()->id;
        //print_r($id);
    }

    public function library(Request $req){
        $quiz=CreateQuiz::where("user_id",Auth::user()->id)->with('users')->get();
        return view('admin\library')->with('quiz',$quiz);
    }

    public function read_question(Request $req,$game){
        $quiz=CreateQuiz::where("user_id",Auth::user()->id)->where("quiz_title",$game)->get();
        $question=Question::where("quiz_id",$quiz[0]->id)->get();
        return view('admin\question')->with('game',$game)->with('question',$question);
    }

    public function save_question(Request $req,$game){
        $req->validate([
            'question' => 'required|max:255',
            'answer' => 'required|max:255',
        ]);
        $quiz=CreateQuiz::where("user_id",Auth::user()->id)->where("quiz_title",$game)->get();
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

    public function update(Request $req){
        $req->validate([
            'firstname'=>'required|max:255',
            'lastname'=>'required|max:255',
            'email'=>'required|email|max:255',
        ]);
        if($req->hasFile('image')){
            $req->validate([
                'image'=>'mimes:jpeg,jpg,png|required|max:5000',
            ]);
            $filename=$req->image->getClientOriginalName();
            $seperate=explode('.',$filename);
            $modified_filename=$seperate[0] . time() . '.' . $seperate[1];
            $req->image->storeAs('images',$modified_filename,'public');
            $update=User::where('id',Auth::user()->id)->update(['name'=>$req->input('firstname'),
                                                                'lastname'=>$req->input('lastname'),
                                                                'email'=>$req->input('email'),
                                                                'image_url'=>$modified_filename]);
        }else{
            $update=User::where('id',Auth::user()->id)->update(['name'=>$req->input('firstname'),
                                                                'lastname'=>$req->input('lastname'),
                                                                'email'=>$req->input('email')]);
        }
        return redirect()->back();
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
        $create=CreateQuiz::where('quiz_title',$game)->where('user_id',Auth::user()->id)->update(['code'=>$random,
                                                                                                        'counter'=>0]);
        return redirect('live/'. $game . '/'. $random);
    }

    public function live(Request $req,$game,$code){
        $quiz_id=CreateQuiz::where('quiz_title',$game)->where('user_id',Auth::user()->id)->get();
        $live=Live::where('quiz_id',$quiz_id[0]->id)->with('createquiz')->with('users')->get();
        return view('admin\live')->with(['game'=>$game,'code'=>$code, 'live'=>$live]);
    }

    public function password_update(Request $req){
        $req->validate([
            'oldpassword'=>'required|min:6',
            'password'=>'required|confirmed|min:6',
        ]);
        $user=User::where("id",Auth::user()->id)->get();
        if(Hash::check($req->input('oldpassword'),$user[0]->password))
        {
            $user = User::where('id',Auth::user()->id)->update(['password'=>Hash::make($req->input('password'))]);
            $req->session()->flash('status','Password has been updated successfully.');
            return redirect('/join');
        }else{
            $req->session()->flash('danger','The given old password is wrong');
            return redirect('/login');
        }

    }

    public function join_game(Request $req){
        $req->validate([
            'code'=>'required',
        ]);
        $code=$req->input('code');
        $exist=CreateQuiz::where('code',$code)->get();
        $already=Live::where('user_id',Auth::user()->id)->where('quiz_id',$exist[0]->id)->get();
        if($already->isEmpty()){
            if(!$exist->isEmpty()){
                if($exist[0]->counter==0){
                    $live=new Live();
                    $live->quiz_id=$exist[0]->id;
                    $live->user_id=Auth::user()->id;
                    $live->save();
                    return redirect('/student_live/' . $exist[0]->id);
                    // $members=Live::where('quiz_id',$exist[0]->id)->with('createquiz')->with('users')->get();
                    // return view('live')->with(['members'=>$members,'code'=>$code, 'game'=>$exist[0]->quiz_title]);
                }else if($exist[0]->counter==1){
                    $questions = Question::where('quiz_id',$exist[0]->id)->paginate(1);
                    return view('playing')->with('questions',$questions);
                }else{
                    $req->session()->flash('danger','Please enter the valid code');
                    return redirect()->back();
                }
            }else{
                $req->session()->flash('danger','Please enter the valid code');
                return redirect()->back();
            }
        }else{
            $req->session()->flash('status','You have already joined');
            return redirect()->back();
        }
    }

    public function student_exit(Request $req, $user_id){
        Live::where('user_id',$user_id)->delete();
        return redirect('/join');
    }

    public function teacher_end(Request $req, $game){
        CreateQuiz::where('user_id',Auth::user()->id)->where('quiz_title',$game)->update(['counter'=>2]);
        return redirect('admin/library');
    }

    public function student_joined(Request $req, $quiz_id){
        $members=Live::where('quiz_id',$quiz_id)->with('createquiz')->with('users')->get();
        return view('live')->with(['members'=>$members,'code'=>$members[0]->createquiz->code, 'game'=>$members[0]->createquiz->quiz_title]);
    }

    // public function teacher_start(Request $req, $game){
    //     CreateQuiz::where('user_id',Auth::user()->id)->where('quiz_title',$game)->update(['counter'=>1]);

    // }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CreateQuiz;
use Auth;
use Session;
use Crypt;


class Users extends Controller
{
    //
    public function register(Request $req){
        $email=$req->input('email');
        $password1=$req->input('password1');
        $password2=$req->input('password2');
        if(empty($req->input('fname')) || empty($req->input('email')) || empty($req->input('password1')) || empty($req->input('password2')) || empty($req->input('used'))){
            $req->session()->flash('status',"Please enter all the fields");
            return redirect('/register');
        }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $req->session()->flash('status',"Please enter the valid email");
            return redirect('/register');
        }else if($password1!=$password2){
            $req->session()->flash('status',"Password doesn't match");
            return redirect('/register');
        }else{
            $user=new User;
            $user->name=$req->input('fname');
            $user->lastname=$req->input('lname');
            $user->email=$req->input('email');
            $user->password=Crypt::encrypt($req->input('password2'));
            $user->used_as=$req->input('used');
            $req->session()->put('user', $req->input('fname'));
            $user->save();
            return redirect('/join');
        }
    }

    public function login(Request $req){
        $user=User::where("email",$req->input('email'))->get();
        if(empty($user)){
            $req->session()->flash('status','email is not registered yet');
            return redirect('/login');
        }
        else if($req->input('password')==Crypt::decrypt($user[0]->password))
        {
            $req->session()->put('user', $user[0]->name);
            $req->session()->put('used', $user[0]->used_as);
            $req->session()->put('user_id', $user[0]->id);
            return redirect('/join');
        }else{
            $req->session()->flash('status','password is wrong');
            return redirect('/login');
        }
    }

    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect('/');
    }

    public function create_quiz(Request $req){
        $createquiz=new CreateQuiz;
        $createquiz->user_id=Session::get('user_id');
        $createquiz->quiz_title=$req->input('quiz_title');
        $createquiz->quiz_description=$req->input('quiz_description');
        $createquiz->save();

        //$id = Auth::user()->id;
        //print_r($id);
        return view('admin\question');
    }

    public function library(Request $req){
        $quiz=CreateQuiz::where("user_id",Session::get('user_id'))->with('users')->get();
        return view('admin\library')->with('quiz',$quiz);
    }
}

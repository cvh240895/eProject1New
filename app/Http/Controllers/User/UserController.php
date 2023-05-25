<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facedes\Storage;

class UserController extends Controller
{
    //view home page of user display
    public function index(){
        return view('pages.user.home');
    }
    //view user details display
    public function detail(){
        return view('pages.user.userDetails');
    }
    //view user change password page
    public function pwdForm(){
        return view('pages.user.pwdChange');
    }
    //validate and change the password
    public function changePwd(Request $req){
        $output1 ="";
        $output2 ="";
        $rules = [
            'password'=>'min:6|max:20|confirmed',
        ];
        $messages = [
            'min'=>':attribute must be at least :min characters',
            'max'=>':attribute must be less than :max characters',
            'confirmed'=>':attribute confirmation is not correct'
        ];
        $req->validate($rules,$massages);
        $check = DB::select('select * from tbl_users where id =? and pwd =?',[$req->id,$req->prePass]);
        if($rules){
            if(empty($check)){
                $output1 = "Password change failed, present password is not correct";
            }
            DB::update('update tbl_users set pwd = ? where id =?',[$req->password,$req->id]);
            $output2 = "Password change is successfully";
        }
        return view('pages.user.result',compact('output1','output2'));
    }
}

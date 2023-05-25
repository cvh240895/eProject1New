<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use DB;
use Hash;

class HomeController extends Controller
{
    public function home(){
        return view('pages.login');
    }

    public function homepages(){
        return view('pages.admin.index');
    }
    public function change(){
        DB::update('update tbl_admins set pwd =? where id = ?',[Bcrypt('123456',3)]);
    }
    public function login(Request $req){
        // dd(Hash::check('123456','$2a$12$rFyWLeGn/Bn1/22kcywZm.j4VTwyyOqbown57rU02GB3s9wYFi5DO'));
        // dd(Bcrypt('123456'));
        $username = $req->userLog;
        $password = $req->pwdLog;
        $remember = $req->has('remember')?true:false;
        $admin = Auth::guard('admins')->attempt(['acc'=>$username,'pwd'=>$password],$remember);
        // dd($admin);
        if($admin == true){
            return redirect()->route('admin.display');
        }
        else{
            return redirect()->back()->with('msg','Account or password is not correct');
        }
    }
}

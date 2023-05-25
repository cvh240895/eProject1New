<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UsersInfos;
use DB;
use Illuminate\Support\Facedes\Storage;

class AdminController extends Controller
{
    //view customer management page
    public function index(){
        return view('pages.admin.index');
    }
    //live search by phone number
    public function searchByNumber(Request $request){
        if($request ->ajax()) 
        {
            $output ='';
            $data = DB::table('tbl_users')->where('phone_num',$request->searchByNumber)->get();
            if($data){
                foreach($data as $i => $value){
                $output .= '<tr><td>User ID</td><td>'.$value->id.'</td><td></td></tr><tr><td>Account</td><td>'.$value->acc.'</td><td></td></tr><tr><td>Full Name</td><td>'.$value->full_name.'</td><td></td></tr><tr><td>Phone Number</td><td>'.$value->phone_num.'</td><td><button onclick="editphone()">Edit</button></td></tr><tr><td>User Email</td><td>'.$value->email.'</td><td><button onclick="editemail()">Edit</button></td></tr><tr><td>User Password</td><td>***********</td><td><button onclick="editpwd()">Edit</button></td></tr>';
                }
            }      
        }
        return Response($output);
    }
    //live search by account
    public function searchByAcc(Request $request){
        if($request ->ajax()) 
        {
            $output ='';
            $data = DB::table('tbl_users')->where('acc',$request->searchByAcc)->get();
            if($data){
                foreach($data as $i => $value){
                $output .= '<tr><td>User ID</td><td>'.$value->id.'</td><td></td></tr><tr><td>Account</td><td>'.$value->acc.'</td><td></td></tr><tr><td>Full Name</td><td>'.$value->full_name.'</td><td></td></tr><tr><td>Phone Number</td><td>'.$value->phone_num.'</td><td><button onclick="editphone('.$value->id.')">Change</button></td></tr><tr><td>User Email</td><td>'.$value->email.'</td><td><button onclick="editemail('.$value->id.')">Change</button></td></tr><tr><td>User Password</td><td>***********</td><td><button onclick="editpwd('.$value->id.')">Change</button></td></tr>';
                }
            }      
        }
        return Response($output);
    }
    //live search by id
    public function searchById(Request $request){
        if($request ->ajax()) 
        {
            $output ='';
            $data = DB::table('tbl_users')->where('id',$request->searchById)->get();
            if($data){
                foreach($data as $i => $value){
                    $output .= '<tr><td>User ID</td><td>'.$value->id.'</td><td></td></tr><tr><td>Account</td><td>'.$value->acc.'</td><td></td></tr><tr><td>Full Name</td><td>'.$value->full_name.'</td><td></td></tr><tr><td>Phone Number</td><td>'.$value->phone_num.'</td><td><button onclick="editphone('.$value->id.')">Change</button></td></tr><tr><td>User Email</td><td>'.$value->email.'</td><td><button onclick="editemail('.$value->id.')">Change</button></td></tr><tr><td>User Password</td><td>***********</td><td><button onclick="editpwd('.$value->id.')">Change</button></td></tr>';
                }
            }      
        }
        return Response($output);
    }
    //live search by email
    public function searchByEmail(Request $request){
        if($request ->ajax()) 
        {
            $output ='';
            $data = DB::table('tbl_users')->where('email',$request->searchByEmail)->get();
            if($data){
                foreach($data as $i => $value){
                    $output .= '<tr><td>User ID</td><td>'.$value->id.'</td><td></td></tr><tr><td>Account</td><td>'.$value->acc.'</td><td></td></tr><tr><td>Full Name</td><td>'.$value->full_name.'</td><td></td></tr><tr><td>Phone Number</td><td>'.$value->phone_num.'</td><td><button onclick="editphone('.$value->id.')">Change</button></td></tr><tr><td>User Email</td><td>'.$value->email.'</td><td><button onclick="editemail('.$value->id.')">Change</button></td></tr><tr><td>User Password</td><td>***********</td><td><button onclick="editpwd('.$value->id.')">Change</button></td></tr>';
                }
            }      
        }
        return Response($output);
    }
    //view change password page
    public function pwdChangeForm(){
        return view('pages.admin.pwdChange');
    }
    //validate and change password
    public function changePwd(Request $request){
        $rules = [ 'password'=>'min:6|max:20|confirmed|required',
                'prePN'=>'required|numeric'
            ];
        $messages =[
            'min'=>':attribute must be at least :min characters',
            'max'=>':attribute must be less than :max characters',
            'confirmed'=>':attribute confirmation is not correct',
            'numeric'=>'Phone number must be number',
            'email'=>'Email is not valid',
            'required'=>':attribute must be not null'
        ];
        $request->validate($rules,$messages);
        if($rules){
            $output1 = "";
            $output2 = "";
            $output3 = "";
            $data = DB::select('select * from tbl_users where phone_num =? and id = ?',[$request->input('prePN'),$request->id]);
            if(!empty($data)){
                $pwd = DB::update('update tbl_users set pwd = md5(?) where phone_num =?',[$request->input('password'),$request->input('prePN')]);    
                $output1 = "Password change successful";
            }else{
                $output2 = "Password change failed, phone number is not correct";
            }
        }
        return view('pages.admin.result',compact('output1','output2','output3'));
    }
    //view change phone number page
    public function changePNForm(){
        return view('pages.admin.pNChange');
    }
    //validate and change phone number
    public function changePN(Request $request){
        $rules = [ 'editPNP'=>'numeric|required',
                'newPN'=>'required|numeric'
            ];
        $messages =[
            'numeric'=>'Phone number must be number',
            'required'=>':attribute must be not null'
        ];
        $request->validate($rules,$messages);
        if($rules){
            $output1 = "";
            $output2 = "";
            $output3 = "";
            $data = DB::select('select * from tbl_users where phone_num =? and id = ?',[$request->input('editPNP'),$request->id]);
            $check = DB::select('select * from tbl_users where phone_num = ?',[$request->input('newPN')]);
            if(empty($check)){
                if(!empty($data)){
                    $pwd = DB::update('update tbl_users set phone_num = ? where phone_num =?',[$request->input('newPN'),$request->input('editPNP')]);    
                    $output1 = "Phone number change successful";
                }else{
                    $output2 = "Phone number change failed, present phone number  is not correct";
                }
            }else{
                $output3 = "Phone number change failed, new phone number has been used";
            }
        }
        return view('pages.admin.result',compact('output1','output2','output3'));
    }
    //view change email page
    public function changeEmailForm(){
        return view('pages.admin.emailChange');
    }
    //validate and change email 
    public function changeEmail(Request $request){
        $rules = [ 'editPNE'=>'numeric|required',
                'newEmail'=>'required|email'
            ];
        $messages =[
            'numeric'=>'Phone number must be number',
            'required'=>':attribute must be not null',
            'email'=>'Email is not valid'
        ];
        $request->validate($rules,$messages);
        if($rules){
            $output1 = "";
            $output2 = "";
            $output3 = "";
            $data = DB::select('select * from tbl_users where phone_num =? and id =?',[$request->input('editPNE'),$request->id]);
            $check = DB::select('select * from tbl_users where email = ?',[$request->input('newEmail')]);
            if(empty($check)){
                if(!empty($data)){
                    $pwd = DB::update('update tbl_users set email = ? where phone_num =?',[$request->input('newEmail'),$request->input('editPNE')]);    
                    $output1 = "Email change successful";
                }else{
                    $output2 = "Email change failed, present phone number is not correct";
                }
            }else{
                $output3 = "Email change failed, new email has been used";
            }
        }
        return view('pages.admin.result',compact('output1','output2','output3'));
    }
}   

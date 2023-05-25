<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facedes\Storage;

class BookingController extends Controller
{
    //view booking form
    public function booking_form(){
        $data = DB::table('tbl_products')->get();
        view('pages.user.booking',compact('data'));
    }
    //validate and add to cart
    public function order(Request $req){
        $rules = [
            'quantity'=>'alpha_num|min:1',
        ];
        $messages = [
            'numeric'=>':attribute must be number',
            'quantity'=>':attribute must be at least :min',
        ];
        $req->validate($rules,$massages);
        if($rules){
            DB::insert('insert into tbl_cart(user_id,pro_id,quantity) values(?,?,?)',[$req->id,$req->ticket_type,$req->quantity]);
        }
        return redirect()->route('user.booking');
    }
}

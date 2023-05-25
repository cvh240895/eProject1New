<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UsersInfos extends Model
{
    public static function getAll(){
        $sql = "SELECT id, userAccount, userPhoneNumber, fullName FROM users WHERE 1=1";
        $rs = DB::select($sql);
        return $rs;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    use HasFactory;

    public function get_users(){
        $users = DB::select('select u.id,u.username,u.email,r.name role,u.photo from users u , roles r where r.id=u.role_id');              
        return $users;
    }

    
}

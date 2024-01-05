<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    public function get_services(){
        $services = DB::select('select s.id,s.servicename,s.price,t.name type,p.photo from services s , types t where t.id=p.id');              
        return $services;
    }   
}

// class Service extends Model
// {
//     use HasFactory;

//     public function get_services(){
//         $services = DB::select('select s.id,s.servicename,s.price,t.name type,p.photo from services s , types t where t.id=p.id');              
//         return $services;
//     }   
// }

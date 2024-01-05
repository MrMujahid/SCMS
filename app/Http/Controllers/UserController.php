<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */

    public function index(){
        $px=DB::getTablePrefix();

        $users = DB::select("select u.id,u.username,u.email,r.name role,u.photo from {$px}users u , {$px}roles r where r.id=u.role_id");

        // $user=new User();
        // $users=$user->get_users();
        return view("pages.erp.system.manage_user",["users"=>$users]);
    }   

    public function create(){
        $px=DB::getTablePrefix();

        $roles = DB::select("select id,name from {$px}roles");       
        return view("pages.erp.system.create_user",["roles"=>$roles]);
    }

    public function store(Request $request){  

        $px=DB::getTablePrefix();

        $role_id= $request->input('cmbRole'); 
        $username = $request->input('txtUsername'); 
        $email=   $request->input('txtEmail');   
        $password=$request->input('txtPassword'); 
        $file=$request->file('filePhoto'); 

        $photo = $username.'.'.$file->getClientOriginalExtension();
        $path = public_path('/img');
        $file->move($path,$photo);

        
        DB::insert("insert into {$px}users(username,email,password,role_id,photo)values('$username','$email','$password','$role_id','$photo')");       
     
        //echo $name;

        //return Redirect::route('users.index');
       // return redirect()->route('users.create', ['error' =>"invalid email"]);
       return back()->with('success','Image Upload successfully');
      
    }

    public function show($id)
    {
        $px=DB::getTablePrefix();

        $user = DB::select("select u.id,u.username,u.email,r.name role,u.photo from {$px}users u , {$px}roles r where r.id=u.role_id and u.id='$id'");
       
        return view("pages.erp.system.details_user",["user"=>$user]);
    }

    public function edit($id){
        $px=DB::getTablePrefix();

        
       $roles = DB::select("select id,name from {$px}roles");

       //$user = DB::select("select id,username,email,role_id from users where id='$id'");
        $user= DB::table('users')->where('id', $id)->first();
        return view("pages.erp.system.edit_user",["user"=>$user,"roles"=>$roles]);
    }

    public function update($id,Request $request){
        $px=DB::getTablePrefix();

        $role_id= $request->input('cmbRole'); 
        $username = $request->input('txtUsername'); 
        $email=   $request->input('txtEmail');   
        $password=$request->input('txtPassword'); 

        $file=$request->file('filePhoto'); 

        $photo = $username.'.'.$file->getClientOriginalExtension();
        $path = public_path('/img');
        $file->move($path,$photo);

        DB::update("update {$px}users set photo='$photo', username='$username',email='$email',password='$password',role_id='$role_id' where id='$id'");       
        

        //return Redirect::route('users.index');
        return back()->with('success','Image Upload successfully');
    }

    public function destroy($id){
        $px=DB::getTablePrefix();

      
        DB::delete("delete from {$px}users where id={$id}");
        //return Redirect::route('users.index');
        return back()->with('success','Image Upload successfully');
    }

}
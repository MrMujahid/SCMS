<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;


class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $px=DB::getTablePrefix();
        $services = DB::select("select * from {$px}services");
        // $user=new User();
        // $users=$user->get_users();
        return view("pages.erp.service.manage_service",["service"=>$services]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $px=DB::getTablePrefix();
        $services = DB::select("select id,name from {$px}services");       
        return view("pages.erp.service.create_service",["services"=>$services]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $px=DB::getTablePrefix();
        $name=$request->input("txtName");
        $price=$request->input("txtPrice");
     

        DB::insert("insert into {$px}services(name,price)values('$name','$price')");

        return Redirect::route('services.index');
       
           return back()->with('success','Image Upload successfully');
   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $px=DB::getTablePrefix();
        $service = DB::select("select id,name,price from {$px}services where id='$id'");
       
        return view("pages.erp.service.details_service",["services"=>$service]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $px=DB::getTablePrefix();
        $services= DB::table('services')->where('id', $id)->first();
         return view("pages.erp.service.edit_service",["service"=>$services]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $px=DB::getTablePrefix();

        $name=$request->input("txtName");
        $price=$request->input("txtPrice");
        

        DB::insert("update {$px}services set name='$name',price='$price' where id='$id'"); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $px=DB::getTablePrefix();

        DB::delete("delete from {$px}services where id={$id}");
        //return Redirect::route('users.index');
        return back()->with('success','Image Upload successfully');
    }

    public function get_service_json(){
          
       
        $px=DB::getTablePrefix();

          $id=$_GET["id"];
          $request=DB::select("select * from {$px}services where id='$id'");
          return json_encode($request[0]);
      }
}

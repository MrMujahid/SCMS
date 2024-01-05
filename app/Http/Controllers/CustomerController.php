<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $px=DB::getTablePrefix();
        $customer = DB::select("select * from {$px}customers");
        // $customer = DB::select("select * from customers");
        // $user=new User();
        // $users=$user->get_users();
        return view("pages.erp.customer.manage_customer",["customers"=>$customer]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $px=DB::getTablePrefix();
        $customers = DB::select("select id,name from {$px}customers");       
        return view("pages.erp.customer.create_customer",["customers"=>$customers]);
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
        $mobile=$request->input("txtMobile");
        $email=$request->input("txtEmail");
        $address=$request->input("txtAddress");

        DB::insert("insert into {$px}customers(name,mobile,email,address)values('$name','$mobile','$email','$address')");

        return Redirect::route('customers.index');
       
        // return back()->with('success','Image Upload successfully');
       
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
        //
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
        

         $customers= DB::table("customers")->where('id', $id)->first();
         return view("pages.erp.customer.edit_customer",["customer"=>$customers]);
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
        $mobile=$request->input("txtMobile");
        $email=$request->input("txtEmail");
        $address=$request->input("txtAddress");

        DB::insert("update {$px}customers set name='$name',mobile='$mobile',email='$email',address='$address' where id='$id'");  

    //    return Redirect::route('customers.index');

    return Redirect::route('customers.index');
       
    // return back()->with('success','Image Upload successfully');
   
    return back()->with('success','Image Upload successfully');
        
        
        
        
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
        DB::delete("delete from {$px}customers where id={$id}");
        //return Redirect::route('users.index');
        return back()->with('success','Image Upload successfully');
    }

    public function get_customer_json(){
        $px=DB::getTablePrefix();
        $id=$_GET["id"];
        $request=DB::select("select * from {$px}customers where id='$id'");
        return json_encode($request[0]);
        // return 'ok';
    }
   
}

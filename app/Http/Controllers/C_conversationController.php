<?php
//--- This code is generated by ProBot ---
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\C_conversation;
use App\Models\C_request_type;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class C_conversationController extends Controller{

	public function index(){
		// $c_conversations=C_conversation::paginate(10);
		// $conver=C_conversation::join('customers as c', 'c_conversations.customer_id', '=', 'c.id')
		// ->join('c_request_types as t','c_conversations.c_request_type_id','=', 't.id')
		// ->select('c_conversations.id','c.name as customer','t.name as type','c_conversations.description','c_conversations.created_at');
		// print_r($conver);
		$px=DB::getTablePrefix();
		// id, customer_id, c_request_type_id, request_date, description, created_at, updated_at
		$conversation=DB::select("SELECT cn.id, c.name as customer, t.name as request_type, cn.request_date, cn.description from {$px}c_conversations cn, {$px}customers c, {$px}c_request_types t where cn.customer_id=c.id and cn.c_request_type_id=t.id");
       


		return view("pages.erp.c_conversation.index_c_conversation",["conversations"=>$conversation]);
		
	}
	public function create(){
		$c_request_types=C_request_type::all();
		$customers=Customer::all();

		return view("pages.erp.c_conversation.create_c_conversation",["c_request_types"=>$c_request_types,"customers"=>$customers]);
	}
	public function store(Request $request){
//		C_conversation::create($request->all());
		$c_conversation=new C_conversation;
		$c_conversation->c_request_type_id=$request->cmbC_request_type;
		$c_conversation->customer_id=$request->cmbCustomer;
		$c_conversation->request_date=$request->txtRequest_date;
		$c_conversation->description=$request->txtDescription;

		$c_conversation->save();
		return back()->with('success','Created Successfully.');
  
	}
	public function show($id){
		$c_conversation=C_conversation::find($id);
		return view("pages.erp.c_conversation.show_c_conversation",["c_conversation"=>$c_conversation]);
	}
	public function edit(C_conversation $c_conversation){
		$c_request_types=C_request_type::all();
		$customers=Customer::all();

		return view("pages.erp.c_conversation.edit_c_conversation",["c_conversation"=>$c_conversation,"c_request_types"=>$c_request_types,"customers"=>$customers]);
	}
	public function update(Request $request,C_conversation $c_conversation){
//		$c_conversation->update($request->all());
		$c_conversation->c_request_type_id=$request->cmbC_request_type;
		$c_conversation->customer_id=$request->cmbCustomer;
		$c_conversation->request_date=$request->txtRequest_date;
		$c_conversation->description=$request->txtDescription;

		$c_conversation->update();
		return redirect()->route("c_conversations.index")->with('success','Updated Successfully.');
    
	}
	public function destroy(C_conversation $c_conversation){
		$c_conversation->delete();
		return redirect()->route("c_conversations.index")->with('success','Deleted Successfully.');
	}
}

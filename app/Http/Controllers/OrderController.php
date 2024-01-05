<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\OrderDetail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $px = DB::getTablePrefix();
        $order = DB::select("SELECT o.id,c.name customer_name,s.name `service`,od.price,o.status_id from {$px}order_details od, {$px}orders o, {$px}services s, {$px}customers c, {$px}status st where o.id=od.order_id and s.id=od.service_id and c.id=o.customer_id and o.status_id=st.id");

        return view("pages.erp.order.manage_order", ["orders" => $order]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $px = DB::getTablePrefix();

        $service = DB::select("select * from {$px}services");
        $model = DB::select("select * from {$px}models");

        $customer = DB::select("select * from {$px}customers");

        return view("pages.erp.order.create_order", ["services" => $service, "customers" => $customer, "models" => $model]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $px = DB::getTablePrefix();

        $order = new Order;
        //print_r($order);
        // id, customer_id, order_date, discount, order_total, paid_amount, delivery_date, status_id, shipping_address, remark, created_at, updated_at, vat
        $order->customer_id = $request->cmbCustomer;
        $order->order_date = date("Y-m-d", strtotime($request->txtOrderDate));
        $order->total_bill = 0;
        $order->paid_amount = 0;
        $order->status_id = 1;
        $order->address = isset($request->txtShippingAddress) ? $request->txtShippingAddress : "NA";
        $order->remark = "Na";
        $order->delivery_date = date("Y-m-d", strtotime($request->txtDueDate));
        //  $order->vat=isset($request->txtVat)?$request->txtVat:"0";
        //echo  $order->vat;
        $order->save();

        //Order Details
        $services = $request->txtServices;

        //print_r($products);

        foreach ($services as $service) {
            $order_detail = new OrderDetail;
            $order_detail->order_id = $order->id;
            $order_detail->service_id = $service["item_id"];
            $order_detail->price = $service["price"];
            $order_detail->total = 0;
            $order_detail->save();

            return Redirect::route('orders.index');
        }
        //Stock

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $px = DB::getTablePrefix();
        DB::delete("delete from {$px}orders where id={$id}");
        DB::delete("delete from {$px}order_details where order_id={$id}");
        return redirect()->route("orders.index")->with('success', 'Deleted Successfully.');
    }
    public function updateStatus(Request $req)
    {

        $status = $req->status_id;
        $id = $req->lc_id;
        Order::where('id', $id)
            ->update(['status_id' => $status]);
        //return back()->with('success', 'status update successfully');
    }
}

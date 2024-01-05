<?php

function create_order($data){

  $customer_id=$data["customer_id"];
  $order_date=$data["order_date"];
  $due_date=$data["due_date"];
  $shipping_address=$data["shipping_address"];
  $discount=$data["discount"];
  $vat=$data["vat"];
  $remark=$data["remark"];
  $products=$data["products"];

  $order_date=date("Y-m-d",strtotime($order_date));//convert date into mysql format
  $due_date=date("Y-m-d",strtotime($due_date));//convert date into mysql format

  $order=new Order("",$customer_id,$order_date,$due_date,$shipping_address,0,0,$remark,1,$discount,$vat);
  $order_id=$order->save();  
  
  $now=date("Y-m-d H:i:s"); 

  foreach($products as $product){
    $orderdetails=new Order_detail("",$order_id,$product["item_id"],$product["qty"],$product["price"],0,$product["discount"]);
    $orderdetails->save();
    
    $s=new Stock("",$product["item_id"],-$product["qty"],1,"Order",$now);//1 for sales order
    $s->save();
  }

  echo "Success";

 // print_r($products);

}

?>
<?php
 //require_once("../models/customer.class.php");
function get_customer($id){ 
  $customer=Customer::get_obj_customer($id);
  echo json_encode($customer);
  
}
?>
<?php
//require_once("../configs/db_config.php");	

function get_categories($data){
  echo Category::get_categorys_json();
}

function save_product($data,$files){

  $name=$data["name"];
  $offer_price=$data["offer_price"];
  $manufacturer_id=$data["manufacturer_id"];
  $regular_price=$data["regular_price"];
  $description=$data["description"];  
  $category_id=$data["category_id"];
  $section_id=$data["section_id"];
  $is_featured=$data["is_featured"];
  $star=$data["star"];
  $is_brand=$data["is_brand"];
  $offer_discount=$data["offer_discount"];
  $uom_id=$data["uom_id"];
  $weight=$data["weight"];
  $barcode=$data["barcode"]; 

   $photo=upload($files["photo"],"img",$name);

   $product=new Product("",$name,$offer_price,$manufacturer_id,$regular_price,$description,$photo,$category_id,$section_id,$is_featured,$star,$is_brand,$offer_discount,$uom_id,$weight,$barcode);
   
   
   $product->save();

    echo json_encode(["data"=>$barcode,"files"=>$photo]);

}

function get_uoms($data){
  echo Uom::get_uoms_json();
}

function get_sections($data){
  echo Section::get_sections_json();
}


function get_products($data){
  echo Product::get_products_json();
}

function get_basic_products_info($data){
     echo Product::get_basic_products_json();
}

function get_product_photo($data){
     echo Product::get_photos_json();
}

function get_product($data){
     $product=Product::get_product($data["id"]);
     echo $product->get_regular_price();
}

function get_product_details($data){
    
     $product=Product::get_product_json($data["id"]);
     echo $product;
}

function get_product_category($data){
 
     
     echo Product::get_product_category_json();

}

// function getProduct($id){
//      global $db,$tx;
    
//      $result=$db->query("select id,name,offer_price,manufacturer_id,regular_price,description,photo,category_id,section_id,featured,star,is_brand_item,discount from {$tx}products where id='$id'");  
//      $row=$result->fetch_object();    
//      echo json_encode($row);
// }

// function getProducts(){
//      global $db,$tx;    
//      $result=$db->query("select id,name,offer_price,manufacturer_id,regular_price,description,photo,category_id,section_id,featured,star,is_brand_item,discount from {$tx}products");  
//      $data=[];
//      while($row=$result->fetch_object()){        
//        array_push($data,$row);        
//      }    
//      echo json_encode($data);
// }

// function deleteProduct($id){
//      global $db,$tx;
//      $db->query("delete from {$tx}products where id='$id'");
//      echo json_encode(["success"=>"Successfully deleted"]);
// }




?>
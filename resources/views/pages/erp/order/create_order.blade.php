@extends('layout.erp.home')
@section('page')
<style>
 #cmbCustomer{
   padding:5px;
 }
</style>
 <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h3>Create Order</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Order</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <form action="#" method="post" >
          @csrf
        <div class="row">
          <div class="col-12">
            


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> Quick Fix
                    <small class="float-right">Date: <?php echo date("d M Y")?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>Quick Fix</strong><br>
                    House:12, Road:1<br>
                    Block:E  Dhaka-1216<br>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <?php
                      //echo Customer::get_selectbox();
                    ?>
                    <select id="cmbCustomer" name="cmbCustomer">
                    @foreach($customers as $customer)
                      <option value="{{$customer->id}}">{{$customer->name}} - {{$customer->mobile}}</option>
          
                    @endforeach
                    </select>
                   <div class="customer-info"></div>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                 
                  <table>
                   
                    <tr><td><b>Order Date:</b></td><td><input type="text" id="txtOrderDate" value=<?php echo date("d-m-Y");?> /></td></tr>
                    <tr><td><b>Due Date:</b></td><td><input type="text" id="txtDueDate" value=<?php echo date("d-m-Y");?> /></td></tr>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>SN</th>
                      <th>Model</th>                     
                      <th>service</th>
                      <th>Price</th>
                      <th>Discount</th>
                      <th>Subtotal</th>
                      <th><input type="button" id="clearAll" value="Clear" /></th>
                    </tr>
                    <tr>
                      <th>#</th>
                      <th>
                      <select id="cmbModel" name="cmbModel">
                        @foreach($models as $model)
                          <option value="{{$model->id}}">{{$model->name}}</option>
                        @endforeach
                        </select>
                        </th>
                      <th>
                        <?php
                         // echo service::get_selectbox();
                       ?>
                       <select id="cmbService" name="cmbService">
                        @foreach($services as $service)
                          <option value="{{$service->id}}">{{$service->name}}</option>
                        @endforeach
                        </select>
                      </th>
                        <th><input type="text" id="txtPrice" /></th>
                        
                        <th><input type="text" id="txtDiscount" /></th>
                        <th></th>
                        <th><input type="button" id="btnAddToCart" value=" + " /></th>
                      </tr>
                    </thead>
                    <tbody  id="items">                    
                   
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Payment Methods:</p>
                  <img src="{{asset('assets')}}/images/visa.png" alt="Visa">
                  <img src="{{asset('assets')}}/images/mastercard.png" alt="Mastercard">
                  
                  <img src="{{asset('assets')}}/images/paypal2.png" alt="Paypal">

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                   Thank you for shopping
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Amount Due 2/22/2014</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tbody>
                     <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td id="subtotal">0</td>
                      </tr>
                      <tr>
                        <th>Tax (5%)</th>
                        <td id="tax">0</td>
                      </tr>
                      <tr>
                        <th>Shipping:</th>
                        <td id="shopping-cost">0</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td id="net-total">0</td>
                      </tr>
                    </tbody></table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <button type="submit" id="btnProcessOrder" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Process Order </button>
                  <button type="button" class="btn btn-dark float-laft" onclick="window.print()"> Print </button>
                  <!-- <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button> -->
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
</form>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <script>
      $(function() {  
        
        //Show calander in textbox
        $("#txtOrderDate").datepicker({dateFormat: 'dd-mm-yy'});
        $("#txtDueDate").datepicker({dateFormat: 'dd-mm-yy'});
        $("#cmbCustomer").select2();
        // $("#cmbService").select2();
        $("#cmbModel").select2();

        printCart();



        //Save into database table
        $("#btnProcessOrder").on("click",function(e){
           
            e.preventDefault();            

              let customer_id=$("#cmbCustomer").val();
              var token = $("input[name='_token']").val();
              var method = $("input[name='_method']").val();
                            
              let order_date=$("#txtOrderDate").val();
              let due_date=$("#txtDueDate").val();
         
              let discount=0;
              let vat=0;
              let shipping_address="na";
              let services=JSON.parse(localStorage.getItem("cart"));
              //console.log(services);
              
              $.ajax({
                url:"{{route('orders.store')}}",
                type:'POST',               
                data:{
                  _token:token,
                  _method:method,
                  "cmbCustomer":customer_id,
                  "txtOrderDate":order_date,
                  "txtDueDate":due_date,
                  "txtShippingAddress":shipping_address,
                  "txtDiscount":discount,
                  "txtVat":vat,
                   "txtServices":services
                },
                success:function(res){
                  console.log(res);
                  clearCart();

               
                }
              });
              
             
        });       



        //Show customer other information
        $("#cmbService").on("change",function(){          
          
           $.ajax({
             url:"<?php echo url("getservice")?>",
             type:'GET',
             data:{"id":$(this).val()},
             success:function(res){
               //console.log(res);
              let service=JSON.parse(res);
               //console.log(service);
              $("#txtPrice").val(service.new_price);
             }
           });
        });     

        //Show customer other information
        $("#cmbCustomer").on("change",function(){
           $.ajax({
             url:"<?php echo url("getcustomer")?>",
             type:'GET',
             data:{"id":$(this).val()},
             success:function(res){
              let customer=JSON.parse(res);
                console.log(customer);
               $(".customer-info").html(customer.name+"- "+customer.mobile+"<br>"+customer.address);
             }
           });
        });      
       
       
      
      
      //Add item to bill temporarily
        $("#btnAddToCart").on("click",function(){
          
            let item_id=$("#cmbService").val(); 
            let name=  $("#cmbService option:selected").text();          
            let price=$("#txtPrice").val();
            let qty=$("#txtQty").val();
            let discount=$("#txtDiscount").val();
            let total_discount=discount*qty;
            let subtotal=price*qty-total_discount;
           
            let item={"name":name,"item_id":item_id,"price":price,"qty":parseFloat(qty),"discount":discount,'total_discount':total_discount,"subtotal":subtotal}; 

             save(item);
             printCart();        
          
        });
       

        


        $("body").on("click",".delete",function(){
           let id=$(this).data("id");        
           delItem(id)
           printCart();
        });
     
        $("#clearAll").on("click",function(){
          clearCart();
        });


    //------------------Cart Functions----------//      


       function printCart(){
          let cart= localStorage.getItem("cart");
             cart=JSON.parse(cart);
           let sn=1;          
           let $bill="";  
           let subtotal=0;
           $.each(cart,function(i,item){
                //console.log(item.name);
             subtotal+=item.price*item.qty-item.discount;
             let $html="<tr>";            
             $html+="<td>";
             $html+=sn;
             $html+="</td>";
             $html+="<td>";
             $html+=item.name;
             $html+="</td>";
             $html+="<td data-field='price'>";
             $html+=item.price;
             $html+="</td>";
             $html+="<td data-field='qty'>";
             $html+=item.qty;
             $html+="</td>";
             $html+="<td data-field='discount'>";
             $html+=item.total_discount;
             $html+="</td>";
             $html+="<td data-field='subtotal'>";
             $html+=item.subtotal;
             $html+="</td>";
             $html+="<td>";
             $html+="<input type='button' class='delete' data-id='"+item.item_id+"' value='-'/>";
             $html+="</td>";
             $html+="</tr>";
             $bill+=$html;
             sn++;
           });      
                      
           $("#items").html($bill); 

           //Order Summary
           $("#subtotal").html(subtotal);
           let tax=(subtotal*0.05).toFixed(2);
           $("#tax").html(tax);
           $("#net-total").html(parseFloat(subtotal)+parseFloat(tax));
        }
     
      
      
       
       
       function save(item){
          let cart= localStorage.getItem("cart");

          if(cart!=null){
            if(!itemExists(item.item_id)){
              cart=JSON.parse(cart);
              cart.push(item);
              localStorage.setItem("cart", JSON.stringify(cart));
            }else{
              QtyUp(item.item_id,item.qty);
            }

          }else{
            cart=[];
            cart.push(item);
            localStorage.setItem("cart", JSON.stringify(cart));
          }
       }


       function QtyUp(id,qty){
          console.log(id)
          let cart= localStorage.getItem("cart");
          if(cart!=null){
            cart=JSON.parse(cart);   
            let tmp=[];  
            
            $.each(cart,function(i,item){
               if(id==item.item_id){
                 item.qty+=qty;
                 discount= item.discount*item.qty;
                 item.total_discount=discount;
                 item.subtotal=(item.qty*item.price)-(discount);
                
                 console.log(item);
                 tmp.push(item);
               }else{
                 tmp.push(item);
               }
            }); 
                      
            localStorage.setItem("cart", JSON.stringify(tmp));
          }
       }


       function itemExists(id){
          let found=0;
          let cart= localStorage.getItem("cart");
          if(cart!=null){
            cart=JSON.parse(cart);                   
            $.each(cart,function(i,item){
               if(id==item.item_id){
                found=1;                
               }
            });          
          }else{
            found=0;
          }

          return found;
       }

       function delItem(id){
          let cart= localStorage.getItem("cart");
          if(cart!=null){
            cart=JSON.parse(cart);   
            let tmp=[];         
            $.each(cart,function(i,item){
               if(id!=item.item_id){
                tmp.push(item);
               }
            });
            localStorage.setItem("cart",JSON.stringify(tmp));
          }
       }


       function clearCart(){
            localStorage.removeItem("cart");
            cart=[];            
            localStorage.setItem("cart", JSON.stringify(cart));
            printCart();
       }      


      });
  </script>

  
@endsection

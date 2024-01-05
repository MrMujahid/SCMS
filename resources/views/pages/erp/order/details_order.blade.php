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
            <h1>Create Order</h1>
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
                    <i class="fas fa-globe"></i> FASHION STAR.
                    <small class="float-right">Date: <?php echo date("d M Y")?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  Customer
                  <address>
                        <b>Name:</b><span class="customer">{{$customers->name}}</span><br>
                        <b>Mobile:</b><span class="customer">{{$customers->mobile}}</span><br>
                        <b>Email:</b><span class="customer">{{$customers->email}}</span><br>
                        <b>Address:</b><span class="customer">{{$customers->address}}</span><br>
                        
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  
                   
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                 
                  <table>
                  <tr><td><b>Order Date:</b></td><td><input type="text" id="txtOrderDate" value="{{$orders->order_date}}" /></td></tr>
                  <tr><td><b>Delivery Date:</b></td><td><input type="text" id="txtDeliveryDate" value="{{$orders->delivery_date}}" /></td></tr>
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
                      <th>Order ID</th>
                      <th>Service</th>
                      <th>Price</th>
                      <th>Total</th>
                    </tr>
                   
                      
                     
                    </thead>
                    <tbody  id="items">                    
                    @foreach($order_details as $detail)

                    <tr>
                      <td>{{$detail->id}}</td>
                      <td>{{$detail->service}}</td>
                      <td>{{$detail->price}}</td>
                      <td>{{$detail->total}}</td>
                      <!-- <td>{{$detail->price*$detail->qty-$detail->discount}}</td> -->
                      
                    </tr>
                    @endforeach
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
                  <p class="lead">Amount Due 01/05/2022</p>

                  <!-- <div class="table-responsive">
                    <table class="table">
                      <tbody>
                     <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td id="subtotal">{{$detail->subtotal}}</td>
                      </tr>
                     
                      <tr>
                        <th>Shipping:</th>
                        <td id="shopping-cost">{{$detail->shipping_address}}</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td id="net-total">{{$detail->total}}</td>
                      </tr>
                    </tbody>
                  </table>
                  </div> -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <!-- <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <button type="submit" id="btnProcessOrder" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Process Order </button> -->
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
         </div><!-- /.row -->
        </form>
      </div><!-- /.container-fluid -->
      <button type="button" class="btn btn-dark float-laft" onclick="window.print()"> Print </button>

    </section>
    <!-- /.content -->
    

  
@endsection
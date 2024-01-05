@extends('layout.erp.home')
@section('page')
<div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update Customer</h4>
                
                  
                  <!-- <div>
                      <a href="{{url('/customers')}}">Manage</a>
                  </div> -->
                  <form class="forms-sample" action="{{route('customers.update',$customer->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <input type="hidden" name="txtId" value="{{$customer->id}}">
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="txtName" placeholder="Customer Name" value="{{$customer->name}}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Mobile</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="txtMobile" placeholder="Mobile" value="{{$customer->mobile}}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control" name="txtEmail" placeholder="Email" value="{{$customer->email}}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputMobile" class="col-sm-3 col-form-label">Address</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="txtAddress" placeholder="Address" value="{{$customer->address}}">
                      </div>
                    </div>
                    
                   
                    
                    <input type="submit" name="btnSubmit" class="btn btn-primary mr-2" value="Submit">               
                    
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>

              @endsection
@extends('layout.erp.home')
@section('page')
<div class="card">
                <div class="card-body">
                  <h4 class="card-title">Customer Form</h4>
                  <p class="card-description">
                     Horizontal form layout
                  </p>
                  
                  <div>
                      <a href="{{url('/customers')}}">Manage</a>
                  </div>
                  <form class="forms-sample" action="{{route('customers.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="txtName" placeholder="Customer Name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Mobile</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="txtMobile" placeholder="Mobile">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control" name="txtEmail" placeholder="Email">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputMobile" class="col-sm-3 col-form-label">Address</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="txtAddress" placeholder="Address">
                      </div>
                    </div>
                    
                   
                    
                    <input type="submit" name="btnSubmit" class="btn btn-primary mr-2" value="Submit">               
                    
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>

              @endsection
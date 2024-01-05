@extends('layout.erp.home')
@section('page')
<div class="card">
                <div class="card-body">
                  <h4 class="card-title">service Form</h4>
                  <p class="card-description">
                     Horizontal form layout
                  </p>
                  
                  <div>
                      <a href="{{url('/services')}}">Manage</a>
                  </div>
                  <form class="forms-sample" action="{{route('services.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="txtName" placeholder="service Name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Price</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="txtPrice" placeholder="Mobile">
                      </div>
                    </div>
                   
                    
                   
                    
                    <input type="submit" name="btnSubmit" class="btn btn-primary mr-2" value="Submit">               
                    
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>

              @endsection
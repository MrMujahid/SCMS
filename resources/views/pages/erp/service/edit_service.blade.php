@extends('layout.erp.home')
@section('page')
<div class="card">
                <div class="card-body">
                <a href="{{url('/services')}}">Manage</a>
                  <h4 class="card-title">Update service</h4>
                
                  
                  <!-- <div>
                      <a href="{{url('/services')}}">Manage</a>
                  </div> -->
                  <form class="forms-sample" action="{{route('services.update',$service->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <input type="hidden" name="txtId" value="{{$service->id}}">
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="txtName" placeholder="service Name" value="{{$service->name}}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Price</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="txtPrice" placeholder="Price" value="{{$service->price}}">
                      </div>
                    </div>
                   
                    
                   
                    
                    <input type="submit" name="btnSubmit" class="btn btn-primary mr-2" value="Submit">               
                    
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>

              @endsection
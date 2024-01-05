<!-- <form action="{{url('user/save')}}" method="post"> -->
 <?php
   //echo isset($_GET["error"])?$_GET["error"]:"";
  
 ?>

@extends('layout.erp.home')
@section('page')

<style>
  .label{
    font-size:60px
  }
</style>

<div class="card" >
                <div class="card-body" width="300px">
                  <h3>Create User</h3>
                      <a href="{{url('/users')}}"><h5>Manage User</h5></a><br>
                  
                  <form class="forms-sample" action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                    <label style="font-size:20px; color:green; font-weight:bold"> Role </label>
                      <select class="form-group form-control" name="cmbRole">
                          @foreach ($roles as $role)
                              <option value="{{$role->id}}">{{$role->name}}</option>
                          @endforeach
                      </select>
                    </div>
   
                    <div class="form-group">
                      <label style="font-size:20px; color:green; font-weight:bold">Username </label>
                      <input type="text" class="form-control" placeholder="Username" name="txtUsername">
                    </div>
                    <div class="form-group">
                      <label style="font-size:20px; color:green; font-weight:bold">Email address</label>
                      <input type="email" class="form-control" placeholder="Email" name="txtEmail">
                    </div>
                    <div class="form-group">
                      <label style="font-size:20px; color:green; font-weight:bold">Password</label>
                      <input type="password" class="form-control" placeholder="Password" name="txtPassword">
                    </div>
                    <div class="form-group">
                      <label style="font-size:20px; color:green; font-weight:bold">Photo</label>
                      <input type="file" class="form-control" placeholder="Choose photo" name="filePhoto">
                    </div>
                    
                    
                    <input type="submit" class="btn btn-primary mr-2" name="btnCreate" value="Create">
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>










 <!-- <a href="{{url('/users')}}">Manage</a>
<form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div>Role<br>
       <select name="cmbRole">
          @foreach ($roles as $role)
               <option value="{{$role->id}}">{{$role->name}}</option>
          @endforeach
       </select>
    </div>
    <div>Username<br>
      <input type="text" name="txtUsername" />
    </div>
    <div>Email<br>
      <input type="text" name="txtEmail" />
    </div>
    <div>Password<br>
      <input type="text" name="txtPassword" />
    </div>
    <div>Photo<br>
      <input type="file" name="filePhoto" />
    </div>
    <div>
      <input type="submit" name="btnCreate" value="Create" />
   </div>
</form> -->

@endsection

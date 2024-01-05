<?php
//print_r($user);
?>
@extends('layout.erp.home')
@section('page')

<a href="{{url('/users')}}"><h5>Manage User</h5></a>

<!-- <form action="{{route('users.update',$user->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method("PUT")
    <input type="hidden" name="txtId" value="{{$user->id}}" />
    <div>
      Role<br>
      <select name="cmbRole">
          @foreach($roles as $role)
              
             @if($role->id==$user->role_id)
               <option value="{{$role->id}}" selected>{{$role->name}}</option>
             @else
              <option value="{{$role->id}}">{{$role->name}}</option>
             @endif

          @endforeach
      </select>
   </div>
    <div>
      Username<br><input type="text" name="txtUsername" value="{{$user->username}}" />
   </div>
   <div>
      Email<br><input type="text" name="txtEmail" value="{{$user->email}}" />
   </div>
   <div>Photo<br>
      <input type="file" name="filePhoto" />
    </div>
   <div>
    <input type="submit" name="btnSubmit" value="Update" />
   </div>
</form> -->


<div class="col-md-6 grid-margin ">
   <div class="card">
      <div class="card-body">
         <h4 class="card-title">Default form</h4>
         <p class="card-description">Basic form layout</p>
         <form action="{{route('users.update',$user->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <input type="hidden" name="txtId" value="{{$user->id}}" />
                        <div>Role</label> <br>
                        <select name="cmbRole">
                                    @foreach($roles as $role)
                                    @if($role->id==$user->role_id)
                                    <option value="{{$role->id}}" selected>{{$role->name}}</option>
                                 @else
                                 <option value="{{$role->id}}">{{$role->name}}</option>
                                 @endif
                                 @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username </label> <br>
                        <input type="text" name="txtUsername" value="{{$user->username}}" />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Email</label> <br>
                        <input type="text" name="txtEmail" value="{{$user->email}}" />
                    </div>
                    <div class="form-group">
                        <label> Photo</label> <br>
                        <input type="file" name="filePhoto" />
                    </div>

                    <div class="form-group">
                        <input type="submit" name="btnSubmit" value="Update"/>
                    </div>
                    </div>
          </form>
                
      </div>
    </div>
</div>


@endsection

@extends('layout.erp.home')
@section('page')

<table>
    <tr><th style="text-align:right">User ID </th><td>{{$user[0]->id}}</td></tr>
    <tr><th  style="text-align:right">Username </th><td>{{$user[0]->username}}</td></tr>
    <tr><th  style="text-align:right">Email </th><td>{{$user[0]->email}}</td></tr>
    <tr><th  style="text-align:right">Role </th><td>{{$user[0]->role}}</td></tr>
</table>
<!-- <div>Photo :<img src='img/{{$user[0]->photo}}' width='200' /></div> -->

@endsection

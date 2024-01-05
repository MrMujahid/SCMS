@extends('layout.erp.home')
@section('page')

<table>
<a href="{{url('/services')}}">Manage</a>
    <tr><th style="text-align:left">Service ID </th><td>{{$services[0]->id}}</td></tr>
    <tr><th  style="text-align:left">Service Name </th><td>{{$services[0]->name}}</td></tr>
    <tr><th  style="text-align:left">Price </th><td>{{$services[0]->price}}</td></tr>

</table>

@endsection

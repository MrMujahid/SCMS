@extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{route('c_conversations.index')}}">Manage</a>
<table class='table'>
	<tr><th>Id</th><td>{{$c_conversation->id}}</td></tr>
	<tr><th>C Request Type Id</th><td>{{$c_conversation->c_request_type_id}}</td></tr>
	<tr><th>Customer Id</th><td>{{$c_conversation->customer_id}}</td></tr>
	<tr><th>Request Date</th><td>{{$c_conversation->request_date}}</td></tr>
	<tr><th>Description</th><td>{{$c_conversation->description}}</td></tr>

</table>

@endsection

@extends('layout.erp.home')
@section('page')

<a href="{{route('purchases.index')}}">Manage</a>
<table class='table'>
	<tr><th>Id</th><td>{{$purchase->id}}</td></tr>
	<tr><th>Supplier Id</th><td>{{$purchase->supplier_id}}</td></tr>
	<tr><th>Purshase Date</th><td>{{$purchase->purshase_date}}</td></tr>
	<tr><th>Discount</th><td>{{$purchase->discount}}</td></tr>
	<tr><th>Order Total</th><td>{{$purchase->order_total}}</td></tr>
	<tr><th>Paid Amount</th><td>{{$purchase->paid_amount}}</td></tr>
	<tr><th>Status</th><td>{{$purchase->status}}</td></tr>
	<tr><th>Delivery Date</th><td>{{$purchase->delivery_date}}</td></tr>

</table>

@endsection

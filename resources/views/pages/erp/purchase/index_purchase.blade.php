@extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{route('purchases.create')}}">Create</a><table class='table'>
<tr>
	<th>Id</th>
	<th>Supplier Id</th>
	<th>Purshase Date</th>
	<th>Discount</th>
	<th>Order Total</th>
	<th>Paid Amount</th>
	<th>Status</th>
	<th>Delivery Date</th>

</tr>
@forelse ($purchases as $purchase)
<tr>
	<td>{{$purchase->id}}</td>
	<td>{{$purchase->supplier_id}}</td>
	<td>{{$purchase->purshase_date}}</td>
	<td>{{$purchase->discount}}</td>
	<td>{{$purchase->order_total}}</td>
	<td>{{$purchase->paid_amount}}</td>
	<td>{{$purchase->status}}</td>
	<td>{{$purchase->delivery_date}}</td>

	<td>
	<div>
	<form action="{{route('purchases.destroy',$purchase->id)}}" method="post" >
	<a class='btn btn-primary' href="{{route('purchases.edit',$purchase->id)}}">Edit<a>
	<a class='btn btn-info' href="{{route('purchases.show',$purchase->id)}}">Show<a>
		@csrf
		@method("DELETE")
		<input class='btn btn-danger' type="submit" name="btnDelete" class="btnDelete" data-id="{{$purchase->id}}"  value="Delete" />
	</form>
	</div>
	</td>
</tr>
@empty
<tr><td colspan="8">No records found</td></tr>
@endforelse
</table>
{{$purchases->links()}}

@endsection

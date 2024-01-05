@extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{route('c_conversations.create')}}">Create</a><table class='table'>
<tr>
	<th>Id</th>
	<th>Customer</th>
	<th>Request Type</th>
	<th>Request Date</th>
	<th>Description</th>
	<th>Action</th>

</tr>
@forelse ($conversations as $conversation)
<tr>
	<td>{{$conversation->id}}</td>
	<td>{{$conversation->customer}}</td>
	<td>{{$conversation->request_type}}</td>
	<td>{{$conversation->request_date}}</td>
	<td>{{$conversation->description}}</td>

	<td>
	<div>
	<form action="{{route('c_conversations.destroy',$conversation->id)}}" method="post" >
	<a class='btn btn-primary' href="{{route('c_conversations.edit',$conversation->id)}}">Edit<a>
	<a class='btn btn-info' href="{{route('c_conversations.show',$conversation->id)}}">Show<a>
		@csrf
		@method("DELETE")
		<input class='btn btn-danger' type="submit" name="btnDelete" class="btnDelete" data-id="{{$conversation->id}}"  value="Delete" />
	</form>
	</div>
	</td>
</tr>
@empty
<tr><td colspan="5">No records found</td></tr>
@endforelse
</table>

@endsection

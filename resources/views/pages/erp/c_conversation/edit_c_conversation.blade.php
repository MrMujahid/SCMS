@extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{url('/c_conversations')}}">Manage</a>
<form action="{{route('c_conversations.update',$c_conversation)}}" method="post" enctype="multipart/form-data">
	@csrf
	@method("PUT")
	{!! select_field(["label"=>"C Request Type Id","name"=>"cmbC_request_type","table"=>$c_request_types,"value"=>$c_conversation->c_request_type_id]) !!}
	{!! select_field(["label"=>"Customer Id","name"=>"cmbCustomer","table"=>$customers,"value"=>$c_conversation->customer_id]) !!}
	{!! input_field(["label"=>"Request Date","name"=>"txtRequest_date","value"=>$c_conversation->request_date]) !!}
	{!! input_field(["label"=>"Description","name"=>"txtDescription","value"=>$c_conversation->description]) !!}

	{!! input_button(["type"=>"submit","name"=>"btnUpdate","value"=>"Update"]) !!}
</form>

@endsection

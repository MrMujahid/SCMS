@extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{url('/c_conversations')}}">Manage</a>
<form action="{{route('c_conversations.store')}}" method="post" enctype="multipart/form-data">
	@csrf
	{!! select_field(["label"=>"C Request Type Id","name"=>"cmbC_request_type","table"=>$c_request_types]) !!}
	{!! select_field(["label"=>"Customer Id","name"=>"cmbCustomer","table"=>$customers]) !!}
	{!! input_field(["label"=>"Request Date","name"=>"txtRequest_date"]) !!}
	{!! input_field(["label"=>"Description","name"=>"txtDescription"]) !!}

	{!! input_button(["type"=>"submit","name"=>"btnCreate","value"=>"Create"]) !!}
</form>

@endsection

@extends('layout.erp.home')
@section('page')

<a href="{{url('/purchases')}}">Manage</a>
<form action="{{route('purchases.store')}}" method="post" enctype="multipart/form-data">
	@csrf
	{!! select_field(["label"=>"Supplier Id","name"=>"cmbSupplier","table"=>$suppliers]) !!}
	{!! input_field(["label"=>"Purshase Date","name"=>"txtPurshase_date"]) !!}
	{!! input_field(["label"=>"Discount","name"=>"txtDiscount"]) !!}
	{!! input_field(["label"=>"Order Total","name"=>"txtOrder_total"]) !!}
	{!! input_field(["label"=>"Paid Amount","name"=>"txtPaid_amount"]) !!}
	{!! input_field(["label"=>"Status","name"=>"txtStatus"]) !!}
	{!! input_field(["label"=>"Delivery Date","name"=>"txtDelivery_date"]) !!}

	{!! input_button(["type"=>"submit","name"=>"btnCreate","value"=>"Create"]) !!}
</form>

@endsection

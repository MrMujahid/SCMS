@extends('layout.erp.home')
@section('page')

<a href="{{url('/purchases')}}">Manage</a>
<form action="{{route('purchases.update',$purchase)}}" method="post" enctype="multipart/form-data">
	@csrf
	@method("PUT")
	{!! select_field(["label"=>"Supplier Id","name"=>"cmbSupplier","table"=>$suppliers,"value"=>$purchase->supplier_id]) !!}
	{!! input_field(["label"=>"Purshase Date","name"=>"txtPurshase_date","value"=>$purchase->purshase_date]) !!}
	{!! input_field(["label"=>"Discount","name"=>"txtDiscount","value"=>$purchase->discount]) !!}
	{!! input_field(["label"=>"Order Total","name"=>"txtOrder_total","value"=>$purchase->order_total]) !!}
	{!! input_field(["label"=>"Paid Amount","name"=>"txtPaid_amount","value"=>$purchase->paid_amount]) !!}
	{!! input_field(["label"=>"Status","name"=>"txtStatus","value"=>$purchase->status]) !!}
	{!! input_field(["label"=>"Delivery Date","name"=>"txtDelivery_date","value"=>$purchase->delivery_date]) !!}

	{!! input_button(["type"=>"submit","name"=>"btnUpdate","value"=>"Update"]) !!}
</form>

@endsection

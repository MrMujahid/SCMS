@extends('layout.erp.home')
@section('page')
<div class="addEmployeeModal modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="user_form">
        <div class="modal-header">
          <h4 class="modal-title">Update Status</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">

          <select id="cmbStatus" name="cmbStatus" class="form-control">
            <option value="1">Received</option>
            <option value="2">Processing</option>
            <option value="3">Complete</option>
            <option value="4">Delivered</option>
          </select>

        </div>
        <div class="modal-footer">
          <input type="hidden" value="1" name="type">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
          <button type="button" class="btn btn-success" id="btnSubmit">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="col-lg-12 stretch-card">
  <div class="card">
    <div class="card-body">
      <!-- <h4 class="card-title">Table with contextual classes</h4>
                  <p class="card-description">
                    Add class <code>.table-{color}</code>
                  </p> -->
      <div class="table-responsive">
        <div>
          <h3><a href="{{route('orders.create')}}">New Order</a></h3>
        </div>
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>
                ID
              </th>
              <th>
                Customer Name
              </th>
              <th>
                Service
              </th>
              <th>
                Price
              </th>
              <th>
                Status
              </th>

              <th>
                Action
              </th>
            </tr>
          </thead>
          <tbody>
            @forelse($orders as $order)
            <tr class="table-info">
              <td>
                {{$order->id}}
              </td>
              <td>
                {{$order->customer_name}}
              </td>
              <td>
                {{$order->service}}
              </td>

              <td>
                {{$order->price}}
              </td>
              @if($order->status_id==1)

              <td><a href=".addEmployeeModal" style="border-radius:20px;" data-lc="{{$order->id}}" class="btn btn-warning btn-sm btnUpdate" data-toggle="modal">Received</a></td>
              @elseif($order->status_id==2)

              <td><a href=".addEmployeeModal" style="border-radius:20px;" data-lc="{{$order->id}}" class="btn btn-info btn-sm btnUpdate" data-toggle="modal"> Processing</a></td>

              @elseif($order->status_id==3)
              <td><a href=".addEmployeeModal" style="border-radius:20px;" data-lc="{{$order->id}}" class="btn btn-success btn-sm btnUpdate" data-toggle="modal"> Complete</a></td>

              @elseif($order->status_id==4)
              <td><a href=".addEmployeeModal" style="border-radius:20px;" data-lc="{{$order->id}}" class="btn btn-primary btn-sm btnUpdate" data-toggle="modal"> Delivered</a></td>
              @endif


              <td>
                <div style="display:flex">
                  <a class="btn btn-outline-primary" href="{{route('orders.edit',$order->id)}}">Edit<a>
                      <!-- <a style="flex:1 1 0" class="btn btn-outline-success" href="{{route('orders.show',$order->id)}}">Details<a>  -->


                      <form action="{{route('orders.destroy',$order->id)}}" method="post" style='float:left'>
                        @csrf
                        @method("DELETE")
                        <input type="submit" name="btnDelete" value="Delete" class="btn btn-outline-danger" />
                      </form>
                </div>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="3">

              </td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
      <input type="hidden" name="" id="lc_id">
    </div>
  </div>
</div>

<script>
  $(function() {
    $(".btnUpdate").on('click', function() {
      let lc_id = $(this).data("lc");
      $("#lc_id").val(lc_id);

    });

    $("#btnSubmit").on('click', function() {
      let id = $("#lc_id").val();
      let status_id = $("#cmbStatus").val();

      $.ajax({
        url: "{{route('update.status')}}",
        type: 'get',
        data: {
          "status_id": status_id,
          "lc_id": id
        },
        success: function(res) {
          location.reload();
        }
      });
    });
  });
</script>

@endsection
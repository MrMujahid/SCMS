@extends('layout.erp.home')
@section('page')
<div class="col-lg-12 stretch-card">
              <div class="card">
                <div class="card-body">
                  <!-- <h4 class="card-title">Table with contextual classes</h4>
                  <p class="card-description">
                    Add class <code>.table-{color}</code> -->
                  </p>
                  <div class="table-responsive">
                      <div>
                          <h3><a href="{{route('customers.create')}}">+ New Customer</a></h3>
                      </div>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                           ID
                          </th>
                          <th>
                            Name
                          </th>
                          <th>
                            Mobile
                          </th>
                          <th>
                            Email
                          </th>
                          <th>
                            address
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                          @forelse($customers as $customer)
                        <tr class="table-info">
                          <td>
                            {{$customer->id}}
                          </td>
                          <td>
                          {{$customer->name}}
                          </td>
                          <td>
                          {{$customer->mobile}}
                          </td>
                          <td>
                          {{$customer->email}}
                          </td>
                          <td>
                          {{$customer->address}}
                          </td>
                          <td>
                          <div style="display:flex">
                                <a  class="btn btn-outline-primary" href="{{route('customers.edit',$customer->id)}}">Edit<a>  
                                <!-- <a style="flex:1 1 0" class="btn btn-outline-success" href="{{route('customers.show',$customer->id)}}">Details<a>  -->


                                <form action="{{route('customers.destroy',$customer->id)}}" method="post" style='float:left'>
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
                </div>
              </div>
            </div>

            @endsection
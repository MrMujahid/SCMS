@extends('layout.erp.home')
@section('page')
<div class="col-lg-12 stretch-card">
              <div class="card">
                <div class="card-body">
                  <!-- <h4 class="card-title">Table with contextual classes</h4>
                  <p class="card-description">
                    Add class <code>.table-{color}</code>
                  </p> -->
                  <div class="table-responsive">
                      <div>
                          <h3><a href="{{route('services.create')}}">+ New Service</a></h3>
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
                            Price
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                          @forelse($service as $services)
                        <tr class="table-info">
                          <td>
                            {{$services->id}}
                          </td>
                          <td>
                          {{$services->name}}
                          </td>
                          <td>
                          {{$services->price}}
                          </td>
                          <td>
                          <div style="display:flex">
                                <a  class="btn btn-outline-primary" href="{{route('services.edit',$services->id)}}">Edit<a>  
                                <a  class="btn btn-outline-success" href="{{route('services.show',$services->id)}}">Details<a> 


                                <form action="{{route('services.destroy',$services->id)}}" method="post" style='float:left'>
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
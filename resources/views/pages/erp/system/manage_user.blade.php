@extends('layout.erp.home')
@section('page')
<style>
  th,td{
    text-align:center;    
  }
  table,th,td{
    border:1px solid lightgray;

  }
</style>
<div class="card-body">
<h2>Manage User</h2>
<h3><a href="{{route('users.create')}}">+ New User</a></h3>

<table>
<div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <tr>
                    <th class="sorting_asc" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Order #: activate to sort column descending" style="width: 200px;">Photo</th>
                        <th class="sorting_asc" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Order #: activate to sort column descending" style="width: 200px;">Name</th>
                        <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Purchased On: activate to sort column ascending" style="width: 200px;">Email</th>
                        <th class="sorting_asc" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Order #: activate to sort column descending" style="width: 200px;">Role</th>
                        <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Purchased On: activate to sort column ascending" style="width: 200px;">Action</th>
                    </tr>

                    @forelse ($users as $user)
                    <tr role="row" class="odd">
                        <td><img src="{{asset('img')}}/{{$user->photo}}" alt="" width="50px" height="50"></td>
                        <td class="sorting_1"> {{ $user->username }}</td>
                        <td> {{ $user->email }}</td>
                        <td> {{ $user->role }}</td>
                        <td>
                            <div style="display:flex">
                                <a style="flex:1 1 0" class="btn btn-outline-primary" href="{{route('users.edit',$user->id)}}">Edit<a>  
                                <a style="flex:1 1 0" class="btn btn-outline-success" href="{{route('users.show',$user->id)}}">Details<a> 
                                <a style="flex:1 1 0" action="{{route('users.destroy',$user->id)}}" method="post" style='float:left'>
                                    @csrf
                                    @method("DELETE")            
                                    <input type="submit" name="btnDelete" value="Delete" class="btn btn-outline-danger" />
                                  </a>
                        </div>
                        </td>
                    </tr>
                    @empty
                        <tr><td colspan="3">No users</td></tr>
                    @endforelse

                    </div>
                    </div>
                    </div>
                    </div>
</table>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


<!-- <div class="card">
            <div class="card-body">
              <h4 class="card-title">Data table</h4>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <div id="order-listing_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer"><div class="row">
                        <div class="col-sm-12 col-md-6"><div class="dataTables_length" id="order-listing_length">
                            <label>Show 
                                <select name="order-listing_length" aria-controls="order-listing" class="form-control">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="-1">All</option>
                                </select> entries</label>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div id="order-listing_filter" class="dataTables_filter">
                                <label>
                                    <input type="search" class="form-control" placeholder="Search" aria-controls="order-listing">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="order-listing" class="table dataTable no-footer" role="grid" aria-describedby="order-listing_info">
                      <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Order #: activate to sort column descending" style="width: 60.2386px;">Order #</th>
                            <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Purchased On: activate to sort column ascending" style="width: 113.477px;">Purchased On</th>
                            <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Customer: activate to sort column ascending" style="width: 78.5795px;">Customer</th>
                            <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Ship to: activate to sort column ascending" style="width: 57.4432px;">Ship to</th>
                            <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Base Price: activate to sort column ascending" style="width: 85.9659px;">Base Price</th>
                            <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Purchased Price: activate to sort column ascending" style="width: 130.955px;">Purchased Price</th><th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 59.8523px;">Status</th><th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 62.1023px;">Actions</th></tr>
                      </thead>
                      <tbody>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                      <tr role="row" class="odd">
                            <td class="sorting_1">1</td>
                            <td>2012/08/03</td>
                            <td>Edinburgh</td>
                            <td>New York</td>
                            <td>$1500</td>
                            <td>$3200</td>
                            <td>
                              <label class="badge badge-info">On hold</label>
                            </td>
                            <td>
                              <button class="btn btn-outline-primary">View</button>
                            </td>
                        </tr><tr role="row" class="even">
                            <td class="sorting_1">2</td>
                            <td>2015/04/01</td>
                            <td>Doe</td>
                            <td>Brazil</td>
                            <td>$4500</td>
                            <td>$7500</td>
                            <td>
                              <label class="badge badge-danger">Pending</label>
                            </td>
                            <td>
                              <button class="btn btn-outline-primary">View</button>
                            </td>
                        </tr><tr role="row" class="odd">
                            <td class="sorting_1">3</td>
                            <td>2010/11/21</td>
                            <td>Sam</td>
                            <td>Tokyo</td>
                            <td>$2100</td>
                            <td>$6300</td>
                            <td>
                              <label class="badge badge-success">Closed</label>
                            </td>
                            <td>
                              <button class="btn btn-outline-primary">View</button>
                            </td>
                        </tr><tr role="row" class="even">
                            <td class="sorting_1">4</td>
                            <td>2016/01/12</td>
                            <td>Sam</td>
                            <td>Tokyo</td>
                            <td>$2100</td>
                            <td>$6300</td>
                            <td>
                              <label class="badge badge-success">Closed</label>
                            </td>
                            <td>
                              <button class="btn btn-outline-primary">View</button>
                            </td>
                        </tr><tr role="row" class="odd">
                            <td class="sorting_1">5</td>
                            <td>2017/12/28</td>
                            <td>Sam</td>
                            <td>Tokyo</td>
                            <td>$2100</td>
                            <td>$6300</td>
                            <td>
                              <label class="badge badge-success">Closed</label>
                            </td>
                            <td>
                              <button class="btn btn-outline-primary">View</button>
                            </td>
                        </tr><tr role="row" class="even">
                            <td class="sorting_1">6</td>
                            <td>2000/10/30</td>
                            <td>Sam</td>
                            <td>Tokyo</td>
                            <td>$2100</td>
                            <td>$6300</td>
                            <td>
                              <label class="badge badge-info">On-hold</label>
                            </td>
                            <td>
                              <button class="btn btn-outline-primary">View</button>
                            </td>
                        </tr><tr role="row" class="odd">
                            <td class="sorting_1">7</td>
                            <td>2011/03/11</td>
                            <td>Cris</td>
                            <td>Tokyo</td>
                            <td>$2100</td>
                            <td>$6300</td>
                            <td>
                              <label class="badge badge-success">Closed</label>
                            </td>
                            <td>
                              <button class="btn btn-outline-primary">View</button>
                            </td>
                        </tr><tr role="row" class="even">
                            <td class="sorting_1">8</td>
                            <td>2015/06/25</td>
                            <td>Tim</td>
                            <td>Italy</td>
                            <td>$6300</td>
                            <td>$2100</td>
                            <td>
                              <label class="badge badge-info">On-hold</label>
                            </td>
                            <td>
                              <button class="btn btn-outline-primary">View</button>
                            </td>
                        </tr><tr role="row" class="odd">
                            <td class="sorting_1">9</td>
                            <td>2016/11/12</td>
                            <td>John</td>
                            <td>Tokyo</td>
                            <td>$2100</td>
                            <td>$6300</td>
                            <td>
                              <label class="badge badge-success">Closed</label>
                            </td>
                            <td>
                              <button class="btn btn-outline-primary">View</button>
                            </td>
                        </tr><tr role="row" class="even">
                            <td class="sorting_1">10</td>
                            <td>2003/12/26</td>
                            <td>Tom</td>
                            <td>Germany</td>
                            <td>$1100</td>
                            <td>$2300</td>
                            <td>
                              <label class="badge badge-danger">Pending</label>
                            </td>
                            <td>
                              <button class="btn btn-outline-primary">View</button>
                            </td>
                        </tr></tbody>
                    </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="order-listing_info" role="status" aria-live="polite">Showing 1 to 10 of 10 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="order-listing_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="order-listing_previous"><a href="#" aria-controls="order-listing" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="order-listing" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item next disabled" id="order-listing_next"><a href="#" aria-controls="order-listing" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>-->


@endsection 

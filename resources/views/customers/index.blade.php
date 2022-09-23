@extends('layouts.app')

@section('title','Customers')

@section('content')
<main>
    <div class="container-fluid px-4">
       <div class="row">
         <div class="col fw-bold fs-3 text-dark">
           Customers
           <hr class="dropdown-divider" style="height:3px;">
         </div>
       </div>
       <div class="row">
         <div class="card">
           <div class="card-header">
            <div class="d-grid gap-2 d-md-block float-end">
              <a href="" class="btn btn-primary "><i class="bi bi-printer"></i> Print</a>
            </div>
            </div>
           <div class="card-body">
            <table id="datatable" class="table table-bordered">
               <thead>
                 <tr>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <th>Action</th>
                 </tr>
               </thead>
               <tbody>
                @foreach ($orders as $key => $order)
                 <tr>
                   <td>{{ $order->name}}</td>
                   <td>{{ $order->phone_number }}</td>
                   <td>{{ $order->address }}</td>
                   <td>
                    <a name="edit" href="" data-bs-toggle="modal" data-bs-target="#edit-customer{{ $order->id }}" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                    <button type="button" name="delete" title="Delete" data-id="" class="delete btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-customer{{ $order->id }}" title="Delete"><i class="bi bi-trash"></i></button>
                   </td>
                 </tr>

                   <!--Edit customer modal -->
                   <div class="modal right fade" id="edit-customer{{ $order->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="staticBackdropLabel">Edit Customer</h4>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                              <div class="col-md-4">
                                <form class="row g-3" action="{{ route('orders.update', $order->id)}}" method="post" enctype="multipart/form-data">
                                  @csrf
                                  @method('put')
                              </div>
                                  <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="name" id="" value = "{{ $order->name }}" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="text" name="phone_number" id="" value = "{{ $order->phone_number }}"class="form-control">
                                  </div>
                                  <div class="form-group mb-2">
                                    <label for="">Address</label>
                                    <input type="text" name="address" id="" value = "{{ $order->address }}" class="form-control">
                                  </div>
                              <div class="modal-footer">
                                <button type="submit" name="update" class="btn btn-secondary">Update</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                              </div>
                            </form>
                              </div>
                          </div>
                      </div>
                    </div>
                  </div>

                      <!--Delete user modal -->
                      <div class="modal right fade" id="delete-customer{{ $order->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title" id="staticBackdropLabel">Delete Customer</h4>
                            </div>
                            <div class="modal-body">
                                    <form class="row g-3" action="{{ route('orders.destroy', $order->id)}}" method="post">
                                      @csrf
                                      @method('delete')
                                      <p>Are you sure you want to delete {{ $order->name }} ?</p>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="submit" name="delete" class="btn btn-secondary">Delete</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                  </div>
                                </form>
                                  </div>
                              </div>
                          </div>
                        </div>
                      </div>
                 @endforeach
               </tbody>
             </table>
           </div>
         </div>
       </div>
    </div>
</main>
@endsection


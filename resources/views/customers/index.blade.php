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
              <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-user"><i class="bi bi-person-plus"></i> Add User</a>
              <a href="" class="btn btn-primary "><i class="bi bi-printer"></i> Print</a>
            </div>
            </div>
           <div class="card-body">
             <table class="table table-bordered">
               <thead>
                 <tr>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <th>Action</th>
                 </tr>
               </thead>
               <tbody>
               
                 <tr>
                   <td></td>
                   <td></td>
                   <td></td>
                   <td>
                    <a name="edit" href="" data-bs-toggle="modal" data-bs-target="#edit-user" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                    <button type="button" name="delete" title="Delete" data-id="" class="delete btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-user" title="Delete"><i class="bi bi-trash"></i></button>
                   </td>
                 </tr>
                 <!--Edit user modal 
                  <div class="modal right fade" id="edit-user" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="staticBackdropLabel">Edit User</h4>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                              <div class="col-md-4 mt-4">
                                <form class="row g-3" action="{{ route('users.update', $user->id)}}" method="post" enctype="multipart/form-data">
                                  @csrf
                                  @method('put')
                                <div class="text-center" style="border:1px dashed black; width: 240px; height: 240px;">
                                  <img src="{{ asset('uploads/images/'.$user->image) }}" width='240px' height='240px' alt="Image" class="img img-responsive">
                                </div>
                                <div class="form-group mt-3 mb-3">
                                  <input type="file" name="image" name="image" value="{{ $user->image }}" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                </div>
                              </div>
                              <div class="col-md-8 ">
                                  <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="name" id="" value = "{{ $user->name }}" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email" id="" value = "{{ $user->email }}" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="text" name="phone_number" id="" value = "{{ $user->phone_number }}"class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label for="">Address</label>
                                    <input type="text" name="address" id="" value = "{{ $user->address }}" class="form-control">
                                  </div>
                                  <div class="form-group ">
                                    <label for="">Password</label>
                                    <input type="password" name="password" id="" value = "{{ $user->password }}" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label for="">Confirm Password</label>
                                    <input type="password" name="confirm-password" value = "{{ $user->password }}" id="" class="form-control">
                                  </div>
                                  <div class="form-group mb-3">
                                    <label for="">Role</label>
                                    <select name="role_as" id="" class="form-control form-select">
                                      <option value="1" @if ($user->role_as == 1)
                                        selected
                                      @endif>Admin</option>
                                      <option value="0" @if ($user->role_as == 0)
                                        selected
                                      @endif>Cashier</option>
                                    </select>
                                  </div>
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
                  </div>-->

                   <!--Delete user modal 
                   <div class="modal right fade" id="delete-user" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="staticBackdropLabel">Delete User</h4>
                        </div>
                        <div class="modal-body">
                                <form class="row g-3" action="{{ route('users.destroy', $user->id)}}" method="post">
                                  @csrf
                                  @method('delete')
                                  <p>Are you sure you want to delete {{ $user->name }} ?</p>
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
                  </div>-->

                  <!--View user modal 
                  <div class="modal right fade" id="view-user data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header float-center">
                          <h4 class="modal-title" id="staticBackdropLabel">View User</h4>
                          </div>
                        <div class="modal-body">
                          <div class="row">
                              <div class="col-md-4 mt-2 mb-3">
                                <div class="text-center" style="border:1px dashed black; width: 240px;height: 240px;">
                                  <img src="{{ asset('uploads/images/'.$user->image) }}" width='240px' height='240px' alt="Image" class="img img-responsive">
                                </div>
                              </div>
                              <div class="col-md-8 mt-3">
                                <form class="row g-3" action="{{ route('users.update', $user->id)}}" method="post">
                                  @csrf
                                  @method('put')
                                  <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="name" id="" value = "{{ $user->name }}" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email" id="" value = "{{ $user->email }}" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="text" name="phone_number" id="" value = "{{ $user->phone_number }}"class="form-control">
                                  </div>
                                  <div class="form-group mb-3">
                                    <label for="">Address</label>
                                    <input type="text" name="address" id="" value = "{{ $user->address }}" class="form-control">
                                  </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                              </div>
                            </form>
                              </div>
                          </div>
                      </div>
                    </div>
                  </div>-->

               </tbody>
             </table>

           </div>
         </div>
       </div>
    </div>
</main>

 
@endsection


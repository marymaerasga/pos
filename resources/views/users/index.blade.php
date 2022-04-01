@extends('layouts.app')

@section('title','User Management')

@section('content')
<main>
    <div class="container-fluid px-4">
       <div class="row">
         <div class="col fw-bold fs-3 text-dark">
           User Management
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
             <table id="datatable" class="table table-bordered">
               <thead>
                 <tr>
                  <th>Name</th>
                  <th>Photo</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <th>Role</th>
                  <th>Action</th>
                 </tr>
               </thead>
               <tbody>
                 @foreach ($users as $key => $user)
                 <tr>
                   <td>{{ $user->name }}</td>
                   <td class="text-center">
                     <img src="{{ asset('uploads/images/'.$user->image) }}" width='60px' height='60px' alt="Image" class="img img-responsive">
                    </td>
                   <td>{{ $user->email }}</td>
                   <td>{{ $user->phone_number }}</td>
                   <td>{{ $user->address }}</td>
                   <td>
                     @if ($user->role_as == 1) Admin
                     @else Cashier
                     @endif
                   </td>
                   <td>
                    <button type="button" name="view"  id="" class="btn btn-success btn-xs" data-bs-toggle="modal" data-bs-target="#view-user{{ $user->id }}"><i class="bi bi-eye"></i></button>
                    <a name="edit" href="" data-bs-toggle="modal" data-bs-target="#edit-user{{ $user->id }}" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                    <button type="button" name="delete" title="Delete" data-id="" class="delete btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-user{{ $user->id }}" title="Delete"><i class="bi bi-trash"></i></button>
                   </td>
                 </tr>
                 <!--Edit user modal -->
                  <div class="modal right fade" id="edit-user{{ $user->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                  </div>

                   <!--Delete user modal -->
                   <div class="modal right fade" id="delete-user{{ $user->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                  </div>

                  <!--View user modal -->
                  <div class="modal right fade" id="view-user{{ $user->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                  </div>
                 @endforeach
               </tbody>
             </table>

           </div>
         </div>
       </div>
    </div>
</main>

    <!-- Add user modal -->
    <div class="modal right fade" id="add-user" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="staticBackdropLabel">ADD USER</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form class="row g-3" action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" id="" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" id="" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Phone</label>
                <input type="text" name="phone_number" id="" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Address</label>
                <input type="text" name="address" id="" class="form-control">
              </div>
              <div class="form-group col-md-6">
                <label for="">Password</label>
                <input type="password" name="password" id="" class="form-control">
              </div>
              <div class="form-group col-md-6">
                <label for="">Confirm Password</label>
                <input type="password" name="confirm-password" id="" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Role</label>
                <select name="role_as" id="" class="form-control form-select">
                  <option value="1">Admin</option>
                  <option value="0">Cashier</option>
                </select>
              </div>
              <div class="form-group mt-3">
                <label for="">Upload User Profile</label>
                <input type="file" name="image" id="image" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" name="save" class="btn btn-secondary">Add</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
          </div>
        </form>
        </div>
      </div>
    </div>
    <!--End Add user modal -->

    
@endsection


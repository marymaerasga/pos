@extends('layouts.app')

@section('title','Products')

@section('content')
<main>
    <div class="container-fluid px-4">
       <div class="row">
         <div class="col fw-bold fs-3 text-dark">
           Products
           <hr class="dropdown-divider" style="height:3px;">
         </div>
       </div>
       <div class="row">
         <div class="card">
           <div class="card-header">
            <div class="d-grid gap-2 d-md-block float-end">
              <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-product"><i class="bi bi-person-plus"></i> Add Product</a>
              <a href="" class="btn btn-primary "><i class="bi bi-printer"></i> Print</a>
            </div>
            </div>
           <div class="card-body">
             <table id="datatable" class="table table-bordered">
               <thead>
                 <tr>
                  <th>No</th>
                  <th>Product Name</th>
                  <th>Image</th>
                  <th>Category</th>
                  <th>Description</th>
                  <th>Size</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Alert Stock</th>
                  <th>Action</th>
                 </tr>
               </thead>
               <tbody>
                 @foreach ($products as $key => $product)
                 <tr>
                   <td>{{ $key + 1 }}</td>
                   <td>{{ $product->product_name }}</td>
                   <td class="text-center">
                    <img src="{{ asset('uploads/images/products/'.$product->image) }}" width='60px' height='60px' alt="Image" class="img img-responsive">
                   </td>
                   <td>
                     @if ($product->category == 1) EVO Helmets
                     @elseif($product->category == 2) RYZEN Helmets 
                    @else CGILLE Helemts
                    @endif
                  </td>
                   <td>{{ $product->description }}</td>
                   <td>{{ $product->size }}</td>
                   <td>{{ number_format($product->price,2) }}</td>
                   <td>{{ $product->quantity }}</td>
                   <td>{{ number_format($product->installment,2) }}</td>
                   <td>{{ number_format($product->gives,2) }}</td>
                   <td class="text-center">
                     @if ($product->alert_stock >= $product->quantity)
                     <span class="badge rounded-fill bg-warning text-dark"> Low Stock </span>
                    @else
                     <span class="badge rounded-fill bg-success">{{ $product->alert_stock }}</span>
                     @endif
                   </td>
                   <td>
                    <a name="edit" href="" data-bs-toggle="modal" data-bs-target="#edit-product{{ $product->id }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
                    <button type="button" name="delete" title="Delete" data-id="" class="delete btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete-product{{ $product->id }}" title="Delete"><i class="bi bi-trash"></i></button>
                   </td>
                 </tr>
                 <!--Delete product modal -->
                 <div class="modal right fade" id="delete-product{{ $product->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="staticBackdropLabel">Delete product</h4>
                      </div>
                      <div class="modal-body">
                              <form class="row g-3" action="{{ route('products.destroy', $product->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <p>Are you sure you want to delete this {{ $product->product_name }} ?</p>
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

                 <!--Edit product modal -->
                  <div class="modal right fade" id="edit-product{{ $product->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="staticBackdropLabel">Edit Product</h4>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-md-4 mt-4">
                              <form class="row g-3" action="{{ route('products.update', $product->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="text-center" style="border:1px dashed black; width: 240px;height: 240px;">
                                  <img src="{{ asset('uploads/images/products/'.$product->image) }}" width='240px' height='240px' alt="Image" class="img img-responsive">
                                </div>
                                <div class="form-group mt-3 mb-3">
                                  <input type="file" name="image" name="image" value="{{ $product->image }}" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                </div>
                              </div>
                              <div class="col-md-8 mt-3">
                                <form class="row g-3" action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                                  @csrf
                                  @method('put')
                                  <div class="form-group">
                                    <label for="">Product Name</label>
                                    <input type="text" name="product_name" id="" value="{{ $product->product_name }}" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label for="">Size</label>
                                    <input type="text" name="size" id="" value="{{ $product->size }}" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label for="">Price</label>
                                    <input type="number" name="price" id="" value="{{ $product->price }}" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea name="description" id="" value="{{ $product->description }}" cols="30" rows="2"class="form-control"></textarea>
                                  </div>
                                <div class="row">
                                  <div class="form-group col-md-6">
                                    <label for="">Quantity</label>
                                    <input type="number" name="quantity" id="" value="{{ $product->quantity }}" class="form-control">
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="">Stock</label>
                                    <input type="number" name="alert_stock" id="" value="{{ $product->alert_stock }}" class="form-control">
                                  </div>
                                </div>
                                  <div class="form-group mb-3">
                                    <label for="">Category</label>
                                    <select class="form-select" name="category" aria-label="Default select example">
                                      <option selected>Select Category</option>
                                      <option value="1" @if ($product->category == 1)
                                        selected
                                      @endif>EVO Helmets</option>
                                      <option value="2" @if ($product->category == 2)
                                        selected
                                      @endif>RYZEN Helmets</option>
                                      <option value="3" @if ($product->category == 3)
                                        selected
                                      @endif>GILLE Helemts</option>
                                    </select>
                                  </div>
                              </div>
                              <div class="modal-footer">
                                <button type="submit" name="save" class="btn btn-secondary">Update Product</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                              </div>
                            </form>
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

    <!-- Add product modal -->
    <div class="modal right fade" id="add-product" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="staticBackdropLabel">ADD PRODUCT</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form class="row g-3" action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="">Product Name</label>
                <input type="text" name="product_name" id="" class="form-control">
              </div>
              
              <div class="form-group col-md-6">
                <label for="">Size</label>
                <input type="text" name="size" id="" class="form-control">
              </div>
              <div class="form-group col-md-6">
                <label for="">Sell Price</label>
                <input type="number" name="price" id="" class="form-control">
              </div>
              
              <div class="form-group col-md-6">
                <label for="">Quantity</label>
                <input type="number" name="quantity" id="" class="form-control">
              </div>
              <div class="form-group col-md-6">
                <label for="">Stock</label>
                <input type="number" name="alert_stock" id="" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Description</label>
                <textarea name="description" id="" cols="30" rows="2"class="form-control"></textarea>
              </div>
              <div class="form-group">
                <label for="">Category</label>
                <select name="category" id="" class="form-control form-select">
                  <option selected>Select Category</option>
                  <option value="1">EVO Helmets</option>
                  <option value="2">RYZEN Helmets</option>
                  <option value="3">GILLE Helemts</option>
                </select>
              </div>
              <div class="form-group">
                <label for="">Upload Product Image</label>
                <input type="file" name="image" id="image" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" name="save" class="btn btn-secondary">Add Product</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
          </div>
        </form>
        </div>
      </div>
    </div>
    <!--End Add product modal -->

    
@endsection


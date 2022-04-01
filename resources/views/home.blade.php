@extends('layouts.app')

@section('title','Admin Dashboard')

@section('content')
   <!-- start main Content here -->
   <main>
    <div class="container-fluid custom-container mt-2 ">
       <div class="row">
         <div class="col fw-bold fs-3 text-dark">
            {{ __('Dashboard') }}
             <h6>
               @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
              @endif
            </h6>
           <hr class="dropdown-divider" style="height:3px;">
         </div>
       </div>
       <div class="row mt-1 d-flex justify-content-center">
         <div class="col-md-3 mb-3">
           <div class="card text-dark" style="width: 225px; height: 158px;">
             <img src="{{ asset('assets/images/brand-identity.png') }}" class="card-img opacity-25" alt="..." style="width: 220px; height: 160px;">
             <div class="card-img-overlay text-center">
               <h3 class="card-title fw-bold ">100</h3>
               <h5 class="card-title">Products</h5>
               <button type="button" class="btnz btn-secondary text-center text-decoration-none mt-2">View Details</button>
             </div>
           </div>
         </div>
         <div class="col-md-3 mb-3">
           <div class="card text-dark" style="width: 225px; height: 158px;">
             <img src="{{ asset('assets/images/man.png') }}" class="card-img opacity-25" alt="..." style="width: 220px; height: 160px;">
             <div class="card-img-overlay text-center">
               <h3 class="card-title  fw-bold ">10</h3>
               <h5 class="card-title">Category</h5>
               <button type="button" class="btnz btn-secondary text-center text-decoration-none mt-2">View Details </button>
             </div>
           </div>
         </div>
         <div class="col-md-3 mb-3">
           <div class="card text-dark" style="width: 225px; height: 158px;">
             <img src="{{ asset('assets/images/order.png') }}" class="card-img opacity-25" alt="..." style="width: 220px; height: 150px;">
             <div class="card-img-overlay text-center">
               <h3 class="card-title fw-bold">10</h3>
               <h5 class="card-title">Orders</h5>
               <button type="button" class="btnz btn-secondary  text-center text-decoration-none mt-2">View Details</button>
             </div>
           </div>
         </div>
         <div class="col-md-3 mb-3">
           <div class="card text-dark" style="width: 225px; height: 158px;">
             <img src="{{ asset('assets/images/money.png') }}" class="card-img opacity-25" alt="..." style="width: 220px; height: 160px;">
             <div class="card-img-overlay text-center">
               <h3 class="card-title  fw-bold">10,000</h3>
               <h5 class="card-title ">Total Income</h5>
               <button type="button" class="btnz btn-secondary  text-center text-decoration-none mt-2">View Details</button>
             </div>
           </div>
         </div>
       </div>
       <div class="row row-cols-1 row-cols-md-2 g-4 mt-1">
         <div class="col">
           <div class="card">
             <h6 class="card-header text-dark ">Sales Chart</h6>
             <div class="card-body text-dark">
               <div id="salesChart" style="height: 250px;"></div>
             </div>
           </div>
         </div>
         <div class="col">
           <div class="card">
             <h6 class="card-header text-dark">Top selling products (2021)</h6>
             <div class="card-body">
               <div id="carouselExampleCaptions" class="carousel carousel-dark slide" data-bs-ride="carousel">
                 <div class="carousel-indicators">
                   <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                   <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                   <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                 </div>
                 <div class="carousel-inner">
                   <div class="carousel-item active">
                     <img src="{{ asset('assets/images/product1.jfif') }}" class="d-block w-100 opacity-75" alt="Vevo XT" style="width: 8rem; height: 16rem;">
                     <div class="carousel-caption d-none d-md-block">
                       <h3 class="fw-bold text-dark">EVO VXR4000</h3>
                       <h6 class="fw-bold text-dark">Pearl White</h6>
                     </div>
                   </div>
                   <div class="carousel-item">
                     <img src="{{ asset('assets/images/product2.jfif') }}" class="d-block w-100 opacity-75" alt="Vevo PX" style="width: 8rem; height: 16rem;">
                     <div class="carousel-caption d-none d-md-block">
                       <h3 class="fw-bold  text-white">EVO VCR4000</h3>
                       <h6 class="fw-bold text-white">Black/Red</h6>
                     </div>
                   </div>
                   <div class="carousel-item">
                     <img src="assets/images/product3.jfif" class="d-block w-100 opacity-75" alt="Vevo Black" style="width: 8rem; height: 16rem;">
                     <div class="carousel-caption d-none d-md-block">
                       <h3 class="fw-bold  text-dark">EVO VXR300</h3>
                       <h6 class="fw-bold text-dark">Black</h6>
                     </div>
                   </div>
                   <div class="carousel-item">
                     <img src="{{ asset('assets/images/product4.jfif') }}" class="d-block w-100 opacity-75" alt="Vevo Red" style="width: 8rem; height: 16rem;">
                     <div class="carousel-caption d-none d-md-block">
                       <h3 class="fw-bold  text-dark">EVO SIGMA</h3>
                       <h6 class="fw-bold text-dark">Black/Orange</h6>
                     </div>
                   </div>
                 </div>
                 <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                   <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                   <span class="visually-hidden">Previous</span>
                 </button>
                 <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                   <span class="carousel-control-next-icon" aria-hidden="true"></span>
                   <span class="visually-hidden">Next</span>
                 </button>
               </div>
             </div>
           </div>
         </div>
       </div>
       <div class="row mt-2">
         <div class="col">
           <div class="card">
             <h6 class="card-header text-dark">Stocks</h6>
             <div class="card-body">
               <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                 <a href="./admin_stocks.php"><button class="btn-sm btn-secondary " type="button">Manage Stock </button></a>
               </div>
               <div class="table-responsive mt-2">
                 <table class="table text-dark">
                   <thead>
                     <tr>
                       <th scope="col">No</th>
                       <th scope="col">Product Name</th>
                       <th scope="col">Category</th>
                       <th scope="col">Stock</th>
                       <th scope="col">Level</th>
                   </thead>
                   <tbody>
                     <tr>
                       <th scope="row">1</th>
                       <td>EVO Helmet SVX</td>
                       <td>Helmets</td>
                       <td>5</td>
                       <td>Low-stock</td>
                     </tr>
                   </tbody>
                 </table>
               </div>
             </div>
           </div>
         </div>
       </div>
       <div class="row mt-5">
         <div class="col">
           <div class="card">
             <h6 class="card-header text-dark">Recent sale</h6>
             <div class="card-body">
               <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                 <a href="./admin_sales_report.php"><button class="btn-sm btn-secondary " type="button">Manage Sale</button></a>
                 <a href="./admin_pos.php"><button class="btn-sm btn-secondary " type="button">POS</button></a>
               </div>
               <div class="table-responsive  mt-2">
                 <table class="table text-dark">
                   <thead>
                     <tr>
                       <th scope="col">#</th>
                       <th scope="col">Customer</th>
                       <th scope="col">Product</th>
                       <th scope="col">Quantity</th>
                       <th scope="col">Unit Price</th>
                       <th scope="col">Total Amount</th>
                     </tr>
                   </thead>
                   <tbody>
                     <tr>
                       <th scope="row">1</th>
                       <td>Walk-in Customer</td>
                       <td>EVO VCR 4000</td>
                       <td>1</td>
                       <td>4, 730</td>
                       <td>4, 730</td>
                     </tr>
                     <tr>
                       <th scope="row">2</th>
                       <td>Walk-in-Customer</td>
                       <td>EVO VXR4000</td>
                       <td>1</td>
                       <td>4,950</td>
                       <td>4,950</td>
                     </tr>
                   </tbody>
                 </table>
               </div>
             </div>
           </div>
         </div>
     </div>
 </div>
 </main>
@endsection

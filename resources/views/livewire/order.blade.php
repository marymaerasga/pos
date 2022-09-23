<div class="col-lg-12">
    <div class="row">
        <div class="col-md-8">
      <div class="card">
        <h4 class="card-header" style="background-color: #DBCFDO; color: #413F3D;">
       <marquee behavior="" direction="">LJ MOTORCYCLE GEAR TRADING POS</marquee>
       </h4>
        <div class="card-body" style="background-color: #F2F1EF; height: 500px;">
              <div class="my-2">
                  <form wire:submit.prevent="InsertoCart">
                    <input type="text" name="" wire:model="product_code" id="" class="form-control" placeholder="Enter Product Code">
                  </form>
              </div>
              {{-- Messages --}}
              @if (session()->has('success'))
              <div class="alert alert-success">{{ session('success') }}</div>
              @elseif(session()->has('info'))
              <div class="alert alert-info">{{ session('info') }}</div>
              @elseif(session()->has('error'))
              <div class="alert alert-danger">{{ session('error') }}</div>
              @endif
     
          <table class="table table-bordered table-left">
            <thead>
              <tr>
               <th></th>
               <th>Product Name</th>
               <th>Qty</th>
               <th>Price</th>
               <th>Dis (%)</th>
               <th colspan="6">Total</th>
            </thead>
            <tbody class="add_more_product">
                <tr>
                    @foreach ($productIncart as $key => $cart)
                    <td class="no">{{ $key + 1 }}</td>
                    <td width= "30%">
                        <input type="text" value ="{{ $cart->product->product_name }}" readonly
                        name="product_name[]" id="product_name" class="form-control product_name">
                    </td>
                    <td width="15%">
                        <div class="row text-center">
                            <div class="col-md-4">
                                <button wire:click.prevent="AddQty({{ $cart->id }})" class="btn btn-sm btn-success"> +</span> </button>
                            </div>
                            <div class="col-md-2">
                                <label for=""> {{ $cart->product_qty }}</label>
                            </div>
                            <div class="col-md-4">
                                <button wire:click.prevent="DecQty({{ $cart->id }})" class="btn btn-sm btn-danger"> - </button>
                            </div>
                        </div>
                        {{--  <input type="number" name="quantity[]" id="quantity"
                        value ="" class="form-control quantity">--}}
                    </td>
                    <td>
                     <input type="number" readonly  name="price[]" id="price" value ="{{ $cart->product->price }}" class="form-control price">
                 </td>
                 <td>
                     <input type="number" readonly name="discount[]" id="discount" value ="{{ $cart->product->discount }}" class="form-control discount">
                 </td>
                 <td>
                     <input type="number" readonly name="total_amount[]" id="total_amount" value ="{{ $cart->product_qty * $cart->product->price }}" class="form-control total_amount">
                 </td>
                 <td>
                     <a href="#" class="btn btn-sm btn-danger rounded-circle"><i class="bi bi-x"  wire:click="removeProduct({{ $cart->id }})"></i></a>
                 </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
      </div>
     <div class="col-md-4">
        {{--  <div class="row ">
             <div class="card">
             <div class="card-header">
             <div class="d-grid gap-2 d-md-block text-center">
                 <h4>Search Product</h4>
             </div>
             </div>
             <div class="card-body">
             </div>
             </div>
         </div> --}}
         <div class="row">
               
             <div class="card " style="background-color: #F2F1EF;">
             <div class="card-header">
                 <h5 style="color: #413F3D;">Grand Total: </h5>
                 <h3 class="float-end" style="color: #413F3D;">₱ <b class="total text-center">{{ $productIncart->sum('product_price') }}</b></h3>
             </div>
             <form action="{{  route('orders.store')}}" method="post">
                @csrf
                @foreach ($productIncart as $key => $cart)
                    <input type="hidden" name="product_id[]" value ="{{ $cart->product->id }}" class="form-control">
                    <input type="hidden" name="quantity[]" value="{{ $cart->product_qty }}">
                    <input type="hidden" name="price[]" value ="{{ $cart->product->price }}" class="form-control">
                    <input type="hidden" name="discount[]" id="discount" class="form-control discount">
                    <input type="hidden" name="total_amount[]" value ="{{ $cart->product_qty * $cart->product->price }}" class="form-control total_amount">
                 @endforeach
                
             <div class="card-body">
                 <div class="panel">
                     <div class="row">
                        <table class="table table-straped " style="background-color: #B1A6A4">
                            <tr>
                                <td>
                                    <label for="">Customer Name</label>
                                    <input type="text" name="customer_name" id="" class="form-control">
                                </td>
                                <td>
                                     <label for="">Customer Phone</label>
                                     <input type="number" name="customer_phone" id="" class="form-control">
                                 </td>
                            </tr>
                        </table>
                       
                        <td> Payment Method
                         <div class="row mt-2">
                             <div class="col-md-4">
                                 <div class="form-check">
                                     <input class="form-check-input true" value="cash" type="radio" name="payment_method" id="payment_method" checked="checked">
                                     <label class="form-check-label" for="payment_method"> <i class="bi bi-cash-coin"></i>
                                     Cash
                                     </label>
                                 </div>
                             </div>
                             <div class="col-md-8">
                                 <div class="form-check">
                                     <input class="form-check-input true" value="installment" type="radio" name="payment_method" id="payment_method">
                                     <label class="form-check-label" for="payment_method"> <i class="bi bi-wallet"></i>
                                     Installment
                                     </label>
                                 </div>
                             </div>
                         </div>
                        </td>
                         <div class="row mt-2">
                             <td>
                                 Payment
                                 <input type="text" wire:model='pay_money' name="paid_amount" id="paid_amount" class="form-control">
                             </td>
                         </div>
                         <div class="row mt-2">
                             <td>
                                 Change
                                 <input type="number" wire:model='balance' readonly name="balance" id="balance" class="form-control">
                             </td>
                         </div>
                       
                         <div class="row mt-4 b-2">
                         <td>
                            <div class="d-grid gap-2 mx-auto">
                                <button type="btn-md" onclick="PrintReceiptContent('print')" class="btn btn-dark btn-sm"><i class="bi bi-printer"></i> Save and Print</button>
                              </div>
                         </td>
                         </div>
                         <div class="row my-3">
                            <div class="btn-group">
                               <button type="button" onclick="PrintReceiptContent('')" class="btn btn-primary btn-sm"><i class="bi bi-clock-history"></i> History</button>
                               <button type="button" onclick="PrintReceiptContent('')" class="btn btn-danger btn-sm"><i class="bi bi-card-checklist"></i> Reports</button>
                           </div>
                           </div>
                     </div>
                    </form>
                 </div>
             </div>
             </div>
         </div>
        </div>
    </div>
 </form>
 </div>
</div>
</main>

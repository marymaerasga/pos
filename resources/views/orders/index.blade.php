@extends('layouts.app')

@section('title','POS')

@section('content')
<main>
    <div class="container-fluid px-4 mt-4">
 @livewire('order')

 <div class="modal">
      <div id="print">
          @include('reports.receipt');
      </div>
  </div>

@endsection

@section('script')
<script>
    //$(document).ready(function(){
       // alert(1);
    //})
    $('.add-more').on('click', function(){
        var product = $('.product_id').html();
        var no_of_row = ($('.add_more_product tr').length - 0) + 1;
        var tr =  '<tr><td class"no"">' + no_of_row + '</td>' +
            '<td><select class="form-control product_id" name="ptoduct_id[]">' + product + '</select></td>' +
            '<td> <input type="number" name="quantity[]" class="form-control quantity"></td>' +
            '<td> <input type="number" name="price[]" class="form-control price"></td>' +
            '<td> <input type="number" name="discount[]" class="form-control discount"></td>' +
            '<td> <input type="number" name="total_amount[]" class="form-control total_amount"></td>' +
            '<td> <a class="btn btn-danger btn-sm delete rounded-circle"><i class="bi bi-x"></i> </a> </td>';
        $('.add_more_product').append(tr);
    });
//delete
    $('.add_more_product').delegate('.delete','click',function(){
        $(this).parent().parent().remove();
    });

function TotalAmount(){
    //Logics
    var total = 0;
    $('.total_amount').each(function(i, e){
        var amount = $(this).val() - 0;
        total += amount;
    });

    $('.total').html(total);
}

$('.add_more_product').delegate('.product_id','change', function(){
    var tr = $(this).parent().parent();
    var price = tr.find('.product_id option:selected').attr('data-price');
    tr.find('.price').val(price);
    var qty = tr.find('.quantity').val() - 0;
    var price = tr.find('.price').val() - 0;
    var disc = tr.find('.discount').val() - 0;
    var total_amount = (qty * price) - ((qty * price * disc) / 100);
    tr.find('.total_amount').val(total_amount);
    TotalAmount();
});

$('.add_more_product').delegate('.quantity , .discount', 'keyup', function(){
    var tr = $(this).parent().parent();
    var qty = tr.find('.quantity').val() - 0;
    var price = tr.find('.price').val() - 0;
    var disc = tr.find('.discount').val() - 0;
    var total_amount = (qty * price) - ((qty * price * disc) / 100);
    tr.find('.total_amount').val(total_amount);
    TotalAmount();
});

$('#paid_amount').keyup(function(){
    //alert(1)
    var total = $('.total').html();
    var paid_amount = $(this).val();
    var total_am = paid_amount - total;
    $('#balance').val(total_am).toFixed(2);
})

//PRINT SECTION
function PrintReceiptContent(el){
    var data = '<input type="button" id="printPageButton" class=" printPageButton" style="display: block; width: 100%; border: none; background-color: #008B8B; color: #fff; padding: 18x 28px; font-size: 16px; cursor: pointer; text-align: center;" value="Print Receipt" onClick="window.print()">';
    data += document.getElementById(el).innerHTML;
    myReceipt = window.open("","myWin","left=150,top=130, width=400, height=400");
        myReceipt.screnX = 0;
        myReceipt.screnY = 0;
        myReceipt.document.write(data);
        myReceipt.document.title = "Print Receipt";
    myReceipt.focus();
    setTimeout(() => {
        myReceipt.close();
    }, 8000);
}
</script>
@endsection

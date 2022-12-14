     <div id="invoice-pos">
        <div id="printed_content">
            <center id="top">
                <img src="{{ asset('assets/images/logo.png') }}" width='80px' height='80px' alt="Image" class="img img-responsive">
                <div class="info text-center"></div>
                <h5>LJ MotorGear Trading</h5>
                <p>
                    Triplet Road Claret, Zamboanga City
                    ljmotorgeartrading@gmail.com
                    09654721134
                </p>
            </center>
        <div class="bot">
            <div id="table">
                <table>
                    <tr class="tabletitle">
                        <td class="item"><h2>Item</h2></td>
                        <td class="Hours"><h2>Qty</h2></td>
                        <td class="Rate"><h2>Unit</h2></td>
                        <td class="Rate"><h2>Discount</h2></td>
                        <td class="Rate"><h2>Total</h2></td>
                    </tr>
                    @foreach ($order_receipt as $receipt)

                    <tr class="service">
                        <td class="tableitem"><p class="itemtext">{{ $receipt->product->product_name }}</p></td>
                        <td class="tableitem"><p class="itemtext">{{ $receipt->quantity }}</p></td>
                        <td class="tableitem"><p class="itemtext">{{ number_format($receipt->unit_price) }}</p></td>
                        <td class="tableitem"><p class="itemtext">{{ $receipt->discount  }}</p></td>
                        <td class="tableitem"><p class="itemtext">{{ number_format($receipt->amount,2) }}</p></td>
                    </tr>
                    @endforeach
                    <tr class="tabletitle">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="Rate">Total</td>
                        <td class="Payment">{{ number_format($order_receipt->sum('amount'),2) }}</td>
                    </tr>
                </table>
                <div class="legalcopy mt-2">
                    <p class="legal">
                        <strong>
                            ** Thank you for visiting **
                        </strong><br>
                        Everything looks better from the inside of a motorcycle helmet.
                    </p>
                </div>
                <div class="serial-number">
                    Serial : <span class="serial">098146732463782</span>
                </div>
                <div class="serial-number">
                    <span class="serial">
                    24/03/2022  07:20
                </span>
            </div>
            </div>
        </div>
      </div>
    <style>
        #invoice-pos{
            box-shadow: 0 0 1in -0.25in rgb(0, 0, 0.5);
            padding: 2mm;
            margin: 0 auto;
            width: 60mm;
            background: #fff;
        }
    
        #invoice-pos ::Selection {
            background: #f5491e;
            color:#fff;
        }
    
        #invoice-pos h2{
            font-size: 0.6em;
        }
        #invoice-pos h3{
            font-size: 1.2em;
            font-weight: 300;
            line-height: 2em;
        }
        #invoice-pos p{
            font-size: 0.8em;
            font-weight: 300;
            line-height: 1.2em;
            text-align: center;
        }
    
        #invoice-pos #top, #invoice-pos #mid, #invoice-pos #bot{
            border-bottom: 1px solod #eee;
        }
        #invoice-pos #top{
            min-height: 100px;
        }
        #invoice-pos #mid{
            min-height: 100px;
        }
        #invoice-pos #bot{
            min-height: 100px;
        }
    
        #invoice-pos #top .logo{
            height: 60px;
            width: 60px;
            background-image: url() no-repeat;
            background-size: 60px 60px;
            border-radius: 50px;
        }
    
        #invoice-pos .info{
            display: block;
            margin-left: 0;
            text-align: center;
        }
        #invoice-pos .title{
        float: right;
        }
        #invoice-pos .title p{
            text-align: right;
        }
        #invoice-pos table{
            width: 100%;
            border-collapse: collapse;
        }
        #invoice-pos .tabletitle{
           font-size: 0.9em;
           background: #eee;
        }
        #invoice-pos .service{
            border-bottom: 1px solid #eee;
         }
         #invoice-pos .item{
           width: 25mm;
         }
         #invoice-pos .itemtext{
            font-size: 0.6em;
          }
          #invoice-pos #legalcopy{
            margin-top: 5mm;
            text-align: center;
          }
          #invoice-pos #legalcopy p{
            margin-top: 5mm;
            text-align: center;
          }
    
          .serial-number{
              margin-top: 5mm;
              margin-bottom: 5mm;
              text-align: center;
              font-size: 12px;
          }
          .serial{
            font-size: 12px !important;
        }
</style>
 @extends('layouts.header')

 @section('content')

 <div class="main-content" id="content">
     <section class="section">
         <div class="section-body">
             <div class="invoice">
                 <div class="invoice-print">
                     <div class="row">
                         <div class="col-lg-12">
                             <div class="invoice-title">
                                 <h2>Invoice</h2>
                                 <div class="invoice-number">Order #12345</div>
                             </div>
                             <hr>
                             <div class="row">
                                 <div class="col-md-6">
                                     <address>
                                         <strong>Billed To:</strong><br>
                                         {{$stockOut->phoneNumber}}<br>
                                         Rwanda<br>
                                     </address>
                                 </div>
                                 <div class="col-md-6 text-md-right">
                                     <address>
                                         <strong>Order Date:</strong><br>
                                         {{$stockOut->created_at}}<br><br>
                                     </address>
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="col-md-6">
                                     <address>
                                         <strong>Payment Method:</strong><br>
                                         {{$stockOut->phoneNumber}}<br>
                                     </address>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="row mt-4">
                         <div class="col-md-12">
                             <div class="section-title">Order Summary</div>
                             <p class="section-lead">All items here cannot be deleted.</p>
                             <div class="table-responsive">
                                 <table class="table table-striped table-hover table-md">
                                     <tr>
                                         <th data-width="40">#</th>
                                         <th>Product Name</th>
                                         <th class="text-center">Price</th>
                                         <th class="text-center">Quantity</th>
                                         <th class="text-right">Totals</th>
                                     </tr>
                                     <?php
                                        $i = 0;
                                        $total = 0;
                                        ?>
                                     @foreach ($stockOut->products as $stock)
                                     <tr>
                                         <td>{{++$i}}</td>
                                         <td> {{$stock->name}}</td>
                                         <td class="text-center">Rwf {{$stock->pivot->unityPrice}}</td>
                                         <td class="text-center">{{$stock->pivot->soldQuantity}}</td>
                                         <td class="text-right">Rwf {{$stock->pivot->unityPrice * $stock->pivot->soldQuantity}}</td>
                                         <?php
                                            $total += $stock->pivot->unityPrice * $stock->pivot->soldQuantity;
                                            ?>
                                     </tr>
                                     @endforeach
                                 </table>
                             </div>
                             <div class="row mt-4">
                                 <div class="col-lg-8">
                                 </div>
                                 <div class="col-lg-4 text-right">
                                     <hr class="mt-2 mb-2">
                                     <div class="invoice-detail-item">
                                         <div class="invoice-detail-name">Total</div>
                                         <div class="invoice-detail-value invoice-detail-value-lg">Rwf {{$total}}</div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <hr>
                 <div class="text-md-right">
                     <!--  -->
                     <button id="cmd" class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</button>
                 </div>
             </div>
         </div>
     </section>
     @endsection

     @push('scripts')

     @endpush

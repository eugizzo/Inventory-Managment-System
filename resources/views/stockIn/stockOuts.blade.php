 @extends('layouts.header')

 @section('content')
 <div class="main-content">
     <section class="section">
         <div class="row">
             <div class="col-12">
                 @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                 @if(Session::has($msg))
                 <div class="alert alert-{{ $msg }} alert-dismissible" role="alert">
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                     {{ Session::get($msg) }}
                 </div>
                 @endif
                 @endforeach
                 <div class="card">

                     <div class="card-header">
                         <h4> Stock Out</h4>
                     </div>
                     <div class="card-body p-0">
                         <div class="table-responsive">
                             <table class="table table-striped">
                                 <tr>
                                     <th class="px-4 py-3">Product Name</th>
                                     <th class="px-4 py-3">Sold Quantity</th>
                                     <th class="px-4 py-3">Sold Price</th>
                                     <th class="px-4 py-3">Recorded Date</th>
                                 </tr>
                                 @forelse ($stocks as $stock)
                                 <tr>
                                     <td class="align-middle">
                                         {{$stock->stockIn->product->name}}
                                     </td>
                                     <td class="align-middle">
                                         {{$stock->quantity}}
                                     </td>
                                     <td class="align-middle">
                                         {{$stock->soldPrice}}
                                     </td>
                                     <td class="align-middle">
                                         {{$stock->created_at}}
                                     </td>
                                 </tr>
                                 @empty
                                 <div class="alert alert-warning alert-dismissible" role="alert">
                                     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                     No Record in the system
                                 </div>
                                 @endforelse

                             </table>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         @endsection

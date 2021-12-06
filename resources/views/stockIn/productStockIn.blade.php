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
                         <h4>{{$product->name}} Stock history</h4>
                     </div>
                     <div class="card-body p-0">
                         <div class="table-responsive">
                             <table class="table table-striped">
                                 <tr>
                                     <th class="px-4 py-3">Purchased Quantity</th>
                                     <th class="px-4 py-3">Unity Price</th>
                                     <th class="px-4 py-3">Supplier</th>
                                     <th class="px-4 py-3">Recorded Date</th>
                                 </tr>
                                 @forelse ($product->stockIn as $stock)
                                 <tr>
                                     <td class="align-middle">
                                         {{$stock->pivot->purchasedQuantity}}
                                     </td>
                                     <td class="align-middle">
                                         {{$stock->pivot->unityPrice}}
                                     </td>
                                     <td class="align-middle">
                                         {{$stock->pivot->supplier}}
                                     </td>
                                     <td class="align-middle">
                                         {{$stock->pivot->created_at}}
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

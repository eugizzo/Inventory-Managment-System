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
                         <h4>history of Stockin</h4>
                     </div>
                     <div class="card-body p-0">
                         <div class="table-responsive">
                             <table class="table table-striped">
                                 <tr>
                                     <th class="px-4 py-3">Date</th>
                                     <th class="px-4 py-3">Details
                                         <table class="table table-striped">
                                             <tr>
                                                 <td class="align-middle">
                                                     Product name
                                                 </td>
                                                 <td class="align-middle">
                                                     Purchased Quantity
                                                 </td>
                                                 <td class="align-middle">
                                                     Unity Price
                                                 </td>
                                                 <td class="align-middle">
                                                     supplier
                                                 </td>
                                             </tr>
                                         </table>

                                     </th>
                                 </tr>
                                 @forelse ($stockIn as $stock)
                                 <tr>
                                     <td class="align-middle">
                                         {{$stock->created_at}}
                                     </td>
                                     <td class="align-middle">
                                         <table class="table table-striped">
                                             @foreach ($stock->products as $one)
                                             <tr>
                                                 <td class="align-middle">
                                                     {{$one->name}}
                                                 </td>
                                                 <td class="align-middle">
                                                     {{$one->pivot->purchasedQuantity}}
                                                 </td>
                                                 <td class="align-middle">
                                                     {{$one->pivot->unityPrice}}
                                                 </td>
                                                 <td class="align-middle">
                                                     {{$one->pivot->supplier}}
                                                 </td>
                                             </tr>
                                             @endforeach
                                         </table>
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

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
                         <h4>history of Sales</h4>
                     </div>
                     <div class="card-body p-0">
                         <div class="table-responsive">
                             <table class="table table-striped">
                                 <tr>
                                     <th class="px-4 py-3">Date</th>
                                     <th class="px-4 py-3">Client Phone Number</th>
                                     <th class="px-4 py-3">Details
                                         <table class="table">
                                             <tr>
                                                 <td class="align-middle">
                                                     Product name
                                                 </td>
                                                 <td class="align-middle">
                                                     Sold Quantity
                                                 </td>
                                                 <td class="align-middle">
                                                     Unity Price
                                                 </td>
                                             </tr>
                                         </table>

                                     </th>
                                     <th class="px-4 py-3">Action</th>
                                 </tr>
                                 @forelse ($stockOut as $stock)
                                 <tr>
                                     <td class="align-middle">
                                         {{$stock->created_at}}
                                     </td>
                                     <td class="align-middle">
                                         {{$stock->phoneNumber}}
                                     </td>
                                     <td class="align-middle">
                                         <table class="table ">
                                             @foreach ($stock->products as $one)
                                             <tr>
                                                 <td class="align-middle">
                                                     {{$one->name}}
                                                 </td>
                                                 <td class="align-middle">
                                                     {{$one->pivot->soldQuantity}}
                                                 </td>
                                                 <td class="align-middle">
                                                     {{$one->pivot->unityPrice}}
                                                 </td>
                                             </tr>
                                             @endforeach
                                         </table>
                                     </td>
                                     <td class="align-middle">
                                         <div class="dropdown">
                                             <a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle text-xl">Options</a>
                                             <div class="dropdown-menu">
                                                 <a href="{{route('invoice',$stock->id)}}" class="dropdown-item has-icon"><i class="far fa-edit"></i>Invoice</a>
                                             </div>
                                         </div>
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

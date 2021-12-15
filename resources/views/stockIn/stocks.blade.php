 @extends('layouts.header')
 <script src="https://unpkg.com/@popperjs/core@2.9.1/dist/umd/popper.min.js" charset="utf-8"></script>
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
                 <h4 class="text-4xl font-bold text-blue-600 font-italic px-8 py-12">Stocks List </h4>
                 <div class="card">
                     <!-- <div class="card-header d-flex justify-content-between"> -->
                         <!-- <h4>List Stocks</h4> -->
                         <!-- <div style="float:right; position: relative;">
                             <a style="align-items: right;" href="{{route('getAddManyStocks')}}" class="btn btn-outline-primary">Add Stocks</a>
                         </div> -->
                     <!-- </div> -->
                     <div class="card-body p-0">
                         <div class="table-responsive">
                             <table class="table table-striped">
                                 <tr class="">
                                     <th class="px-4 py-3 text-2xl">#</th>
                                     <th class="px-4 py-3 text-2xl">Product Name</th>
                                     <th class="px-4 py-3 text-2xl">Purchased Quantity</th>
                                     <th class="px-4 py-3 text-2xl">Remaining Quantity</th>
                                     <th class="px-4 py-3 text-2xl">Sold Quantity</th>
                                     <th class="px-4 py-3 text-2xl">Recorded Date</th>
                                     <th class="px-4 py-3 text-2xl">Actions</th>
                                 </tr>
                                 @forelse ($stocks as $stock)
                                 <tr>
                                 <td class="align-middle px-4 text-xl">
                                         {{$stock->product->id}}
                                     </td>
                                     <td class="align-middle px-4 text-xl">
                                         {{$stock->product->name}}
                                     </td>
                                     <td class="align-middle  px-4text-xl">
                                         {{$stock->purchasedQuantity}}
                                     </td>
                                     <td class="align-middle px-4 text-xl">
                                         {{$stock->remainingQuantity}}
                                     </td>
                                     <td class="align-middle px-4 text-xl">
                                         {{$stock->soldQuantity}}
                                     </td>
                                     <td class="align-middle px-4 text-xl">
                                         {{$stock->created_at}}
                                     </td>
                                     <td class="align-middle px-4 text-xl">
                                         <a href="{{route('getProductStockIn',$stock->product->id)}}" class="badge badge-warning">View StockIn history
                                         </a>
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

         <div class="relative">
  <div class="fixed bottom-48 right-48 ">
  <a style="align-items: right;" href="{{route('getAddManyStocks')}}" class="animate-pulse  py-8 bg-blue-600 text-xl text-white text-red-100 rounded-full px-8 fixed text-blue-600 hover:text-blue-700 transition duration-150 ease-in-out"
      data-bs-toggle="tooltip" data-bs-placement="left" title="Please add product in Stock !"><i class="fa fa-plus fa-2x" aria-hidden="true"></i></a>
 
</div>

<script type="text/javascript">
  var tooltipTriggerList = [].slice.call(
    document.querySelectorAll('[data-bs-toggle="tooltip"]')
  );
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new Tooltip(tooltipTriggerEl);
  });
</script>

         @endsection

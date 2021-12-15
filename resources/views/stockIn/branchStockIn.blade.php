
 @extends('layouts.header')

 @section('content')
 <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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

                 <div>
                         <h4 class="text-4xl font-bold text-blue-600 font-italic px-8 py-12">history of Stockin</h4>
                     </div>
                 <div class="card">

                     <div class="card-body p-0">
                         <div class="table-responsive">
                             <table class="table table-bordered" id="example">
                                 <tr class="">
                                     <th class=" col-sm-4"><h1 class= "text-2xl text-blue-600 ml-8">Dates</h1></th>
                                      <th class="col-sm-8 pt-4 text-2xl text-blue-600">Details
                                        <table class="table ">
                                            <tr class="text-blue-600">
                                                <td class="col-sm-2 text-xl">Product name</td>
                                                <td class="col-sm-2 text-xl">Purchased Quantity</td>      
                                                <td class="col-sm-2 text-xl">Unity Price</td>
                                                <td class="col-sm-2 text-xl">supplier</td>
                                                    
                                            </tr>
                                         </table>

                                     </th>
                                 </tr> 
                                 @forelse ($stockIn as $stock)
                                 <tr >
                                     <td class="col-sm-4 text-xl px-4">{{$stock->created_at}}</td>
                                     <td class="col-sm-8 text-xl">
                                         <table class="table table-bordered" id="">
                                             @foreach ($stock->products as $one)
                                            <tr>
                                                <td class="col-sm-2 text-xl">{{$one->name}}</td>
                                                <td class="col-sm-2 text-xl">{{$one->pivot->purchasedQuantity}}</td>
                                                <td class="col-sm-2 text-xl">{{$one->pivot->unityPrice}}</td>
                                                <td class="col-sm-2 text-xl">{{$one->pivot->supplier}}</td>
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
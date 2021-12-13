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
                 <h4>{{$company }} Company</h4>
                 <div class="card">

                     <!-- <div class="card-header d-flex justify-content-between"> -->
                         <!-- <h4>{{$company }} Products</h4>
                         @if(Auth::user()->role =="owner")
                         <div style="float:right; position: relative;">
                             <a style="align-items: right;" href="{{route('getAddProduct')}}" class="btn btn-outline-primary">Add Product</a>
                         </div>
                         @endif -->
                     <!-- </div> -->
                     <div class="card-body p-0">
                         <div class="table-responsive">
                             <table class="table table-striped" id="table-1">
                                 <tr>
                                    <th class="px-4 py-3 text-xl">#</th>
                                     <th class="px-4 py-3 text-xl">Product Name</th>
                                     <th class="px-4 py-3 text-xl">Category</th>
                                     <th class="px-4 py-3 text-xl">Brand</th>
                                     @if(Auth::user()->role =="owner")
                                     <th class="px-4 py-3 text-xl">Purchased Quantity</th>
                                     <th class="px-4 py-3 text-xl">Sold Quantity</th>
                                     <th class="px-4 py-3 text-xl">Remaining Quantity</th>
                                     <th class="px-4 py-3 text-xl">RecordedBy</th>
                                     <th class="px-4 py-3 text-xl">Actions</th>
                                     @endif
                                 </tr>
                                 @forelse ($products as $product)
                                 <tr>
                                 <td class="align-middle px-4 text-2xl">
                                         {{$product->id}}
                                     </td>
                                     <td class="align-middle px-4 text-2xl">
                                         {{$product->name}}
                                     </td>
                                     <td class="align-middle px-4 text-2xl">
                                         {{$product->category->name}}
                                     </td>
                                     <td class="align-middle px-4 text-2xl">
                                         {{$product->brand->name}}
                                     </td>
                                     @if(Auth::user()->role =="owner")
                                     <td class="align-middle px-4 text-2xl">
                                         {{$product->purchasedQuantity}}
                                     </td>
                                     <td class="align-middle px-4 text-2xl">
                                         {{$product->soldQuantity}}
                                     </td>
                                     <td class="align-middle px-4 text-2xl">
                                         {{$product->remainingQuantity}}
                                     </td>

                                     <td class="align-middle px-4 text-2xl">
                                         {{$product->user->firstName}}
                                     </td>
                                     <td class="align-middle px-4 text-2xl">

                                         <div class="dropdown px-4 text-2xl">
                                             <a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle text-xl">Options</a>
                                             <div class="dropdown-menu">
                                                 <a href="{{route('getUpdateProduct',$product->id)}}" class="dropdown-item has-icon"><i class="far fa-edit"></i> Update</a>
                                                 <div class="dropdown-divider"></div>
                                                 <a href="{{route('deleteProduct',$product->id)}}" class="dropdown-item has-icon text-danger"><i class="far fa-trash-alt"></i>
                                                     Delete</a>
                                             </div>
                                         </div>
                                     </td>
                                     @endif
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
        @if(Auth::user()->role =="owner")
      

    
            <div class="relative">
                <div class="fixed bottom-48 right-48 ">
                    <a style="align-items: right;" href="{{route('getAddProduct')}}" class="animate-pulse px-12 py-8 bg-blue-600 text-xl text-white rounded-full px-2 fixed "><i class="fa fa-plus" aria-hidden="true"></i> Add Product</a>
               </div>
            <div>
        @endif
    @endsection

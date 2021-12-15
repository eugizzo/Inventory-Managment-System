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
                 <h4 class="text-4xl font-bold text-blue-600 font-italic px-8 py-12 ">List of Brand</h4>
                 <div class="card">
                     <!-- <div class="card-header d-flex justify-content-between">
                         <h4>List of Brands</h4> 
                          <div style="float:right; position: relative;">
                             <a style="align-items: right;" href="{{route('getAddBrand')}}" class="btn btn-outline-primary">Register Brand</a>
                         </div> -->
                     <!-- </div> -->
                     <div class="card-body p-0">
                         <div class="table-responsive">
                             <table class="table table-striped">
                                 <tr>
                                     <th class="px-4 py-3 text-4xl font-bold">#</th>
                                     <th class="px-4 py-3 text-3xl font-bold">Brand Name</th>
                                     <th class="px-4 py-3 text-3xl font-bold">Date</th>
                                     <th class="px-4 py-3 text-3xl font-bold">Actions</th>
                                 </tr>
                                 @forelse ($brands as $brand)
                                 <tr>
                                 <td class="align-middle px-4 text-2xl">
                                         {{$brand->id}}
                                     </td>
                                     <td class="align-middle px-4 text-2xl">
                                         {{$brand->name}}
                                     </td>
                                     <td class="align-middle py-4 text-2xl">
                                         {{$brand->created_at}}
                                     </td>
                                     <td class="align-middle px-4 text-2xl">
                                         <div class="dropdown">
                                             <a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Options</a>
                                             <div class="dropdown-menu">
                                                 <a href="{{route('getUpdateBrand',$brand->id)}}" class="dropdown-item has-icon"><i class="far fa-edit"></i> Edit</a>
                                                 <div class="dropdown-divider"></div>
                                                 <a href="{{route('deleteBrand',$brand->id)}}" class="dropdown-item has-icon text-danger"><i class="far fa-trash-alt"></i>
                                                     Delete</a>
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

  

  <div class="fixed bottom-48 right-48 ">
  <a style="align-items: right;" href="{{route('getAddBrand')}}" class="animate-pulse  py-8 bg-blue-600 text-xl text-white text-red-100 rounded-full px-8 fixed text-blue-600 hover:text-blue-700 transition duration-150 ease-in-out"
      data-bs-toggle="tooltip" data-bs-placement="left" title="Please add Brand !"><i class="fa fa-plus fa-2x" aria-hidden="true"></i></a>
 
</div>

            
          @endsection

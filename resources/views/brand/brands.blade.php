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
                     <div class="card-header d-flex justify-content-between">
                         <h4>List of Brands</h4>
                         <div style="float:right; position: relative;">
                             <a style="align-items: right;" href="{{route('getAddBrand')}}" class="btn btn-outline-primary">Register Brand</a>
                         </div>
                     </div>
                     <div class="card-body p-0">
                         <div class="table-responsive">
                             <table class="table table-striped">
                                 <tr>
                                     <th class="px-4 py-3">Brand Name</th>
                                     <th class="px-4 py-3">Date</th>
                                     <th class="px-4 py-3">Actions</th>
                                 </tr>
                                 @forelse ($brands as $brand)
                                 <tr>
                                     <td class="align-middle">
                                         {{$brand->name}}
                                     </td>
                                     <td class="align-middle">
                                         {{$brand->created_at}}
                                     </td>
                                     <td class="align-middle">
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
         @endsection

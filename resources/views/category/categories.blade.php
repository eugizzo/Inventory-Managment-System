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
                         <h4>List of Categories</h4>
                         <div style="float:right; position: relative;">
                             <a style="align-items: right;" href="{{route('getAddCategory')}}" class="btn btn-outline-primary">Register Category</a>
                         </div>
                     </div>
                     <div class="card-body p-0">
                         <div class="table-responsive">
                             <table class="table table-striped">
                                 <tr>
                                     <th class="px-4 py-3">Category Name</th>
                                     <th class="px-4 py-3">Category Unity</th>
                                     <th class="px-4 py-3">Date</th>
                                     <th class="px-4 py-3">Actions</th>
                                 </tr>
                                 @forelse ($categories as $category)
                                 <tr>
                                     <td class="align-middle">
                                         {{$category->name}}
                                     </td>
                                     <td class="align-middle">
                                         {{$category->unity}}
                                     </td>
                                     <td class="align-middle">
                                         {{$category->created_at}}
                                     </td>

                                     <td class="align-middle">
                                         <div class="dropdown">
                                             <a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Options</a>
                                             <div class="dropdown-menu">
                                                 <a href="{{route('getUpdateCategory',$category->id)}}" class="dropdown-item has-icon"><i class="far fa-edit"></i> Edit</a>
                                                 <div class="dropdown-divider"></div>
                                                 <a href="{{route('deleteCategory',$category->id)}}" class="dropdown-item has-icon text-danger"><i class="far fa-trash-alt"></i>
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

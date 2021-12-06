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
                         <h4>{{$company->name}} Branches</h4>
                         <div style="float:right; position: relative;">
                             <a style="align-items: right;" href="{{route('getAddBranch')}}" class="btn btn-outline-primary">Register Branch</a>
                         </div>
                     </div>
                     <div class="card-body p-0">
                         <div class="table-responsive">
                             <table class="table table-striped" id="table-1">
                                 <tr>
                                     <th class="px-4 py-3">Branch Name</th>
                                     <th class="px-4 py-3">Branch Status</th>
                                     <th class="px-4 py-3">Branch Address</th>
                                     <th class="px-4 py-3">Manager Names</th>
                                     <th class="px-4 py-3">Manager Email</th>
                                     <th class="px-4 py-3">Manager Phone Number</th>
                                     <th class="px-4 py-3">Manager Gender</th>
                                     <th class="px-4 py-3">Manager Dob</th>
                                     <th class="px-4 py-3">Manager Status</th>
                                     <th class="px-4 py-3">Actions</th>
                                 </tr>
                                 @forelse ($branches as $branch)
                                 <tr>
                                     <td class="align-middle">
                                         {{$branch->name}}
                                     </td>
                                     <td class="align-middle">
                                         <a href="{{route('changeBranchStatus',$branch->id)}}" @if($branch->status == 'active')
                                             class="badge badge-success">{{$branch->status}}
                                             @else
                                             class="badge badge-danger">{{$branch->status}}
                                             @endif
                                         </a>
                                     </td>
                                     <td class="align-middle">
                                         {{$branch->address}}
                                     </td>
                                     <td class="align-middle">
                                         {{$branch->user->firstName}} {{$branch->user->lastName}}
                                     </td>
                                     <td class="align-middle">
                                         {{$branch->user->email}}
                                     </td>
                                     <td class="align-middle">
                                         {{$branch->user->phoneNumber}}
                                     </td>
                                     <td class="align-middle">
                                         {{$branch->user->gender}}
                                     </td>
                                     <td class="align-middle">
                                         {{$branch->user->dob}}
                                     </td>
                                     <td class="align-middle">
                                         <div class="flex items-center space-x-4 text-sm">

                                             <a href="{{route('changeUserStatus',$branch->user->id)}}" @if($branch->user->status == 'active')
                                                 class="badge badge-success">{{$branch->user->status}}
                                                 @else
                                                 class="badge badge-danger">{{$branch->user->status}}
                                                 @endif
                                             </a>


                                         </div>
                                     </td>
                                     <td class="align-middle">


                                         <div class="dropdown">
                                             <a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Options</a>
                                             <div class="dropdown-menu">
                                                 <a href="{{route('getStock',$branch->id)}}" class="dropdown-item has-icon"><i class="fas fa-eye"></i> View Stock</a>
                                                 <a href="{{route('getChangeManager',$branch->id)}}" class="dropdown-item has-icon"><i class="fas fa-edit"></i> Change Manager</a>
                                                 <a href="{{route('getUpdateBranch',$branch->id)}}" class="dropdown-item has-icon"><i class="far fa-edit"></i> Edit</a>
                                                 <!-- <div class="dropdown-divider"></div> -->
                                                 <a href="{{route('deleteBranch',$branch->id)}}" class="dropdown-item has-icon text-danger"><i class="far fa-trash-alt"></i>
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

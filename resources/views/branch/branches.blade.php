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

                 <div class="text-4xl font-bold text-blue-600 font-italic px-8 py-12">
                     <h4>{{$company->name}} Company</h4>
                 </div>
                 <div class="card">
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
                                         <a href="{{route('changeBranchStatus',Crypt::encrypt($branch->id))}}" @if($branch->status == 'active')
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

                                             <a href="{{route('changeUserStatus',Crypt::encrypt($branch->user->id))}}" @if($branch->user->status == 'active')
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
                                                 @if(Auth::user()->role == 'owner')
                                                 <a href="{{route('getStock',Crypt::encrypt($branch->id))}}" class="dropdown-item has-icon"><i class="fas fa-eye"></i> View Stock</a>
                                                 <a href="{{route('getChangeManager',Crypt::encrypt($branch->id))}}" class="dropdown-item has-icon"><i class="fas fa-edit"></i> Change Manager</a>
                                                 <a href="{{route('getUpdateBranch',Crypt::encrypt($branch->id))}}" class="dropdown-item has-icon"><i class="far fa-edit"></i> Edit</a>
                                                 @endif
                                                 <a href="{{route('deleteBranch',Crypt::encrypt($branch->id))}}" class="dropdown-item has-icon text-danger"><i class="far fa-trash-alt"></i>
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



         @if(Auth::user()->role == 'owner')
         <div class="relative">
             <div class="fixed bottom-48 right-48 ">
                 <a style="align-items: right;" href="{{route('getAddBranch')}}" class="animate-pulse px-12 py-8 bg-blue-600 text-xl text-white rounded-full px-2 fixed "><i class="fa fa-plus" aria-hidden="true"></i> Add Branch</a>
             </div>
             <div>
                 @endif
                 @endsection

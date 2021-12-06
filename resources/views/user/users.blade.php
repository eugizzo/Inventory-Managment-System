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
                         <h4>Users</h4>
                     </div>
                     <div class="card-body p-0">
                         <div class="table-responsive">
                             <table class="table table-striped">
                                 <tr>
                                     <th class="px-4 py-3">First Name</th>
                                     <th class="px-4 py-3">Last Name</th>
                                     <th class="px-4 py-3">User Email</th>
                                     <th class="px-4 py-3">User Phone Number</th>
                                     <th class="px-4 py-3">User Gender</th>
                                     <th class="px-4 py-3">User Dob</th>
                                     <th class="px-4 py-3">User Status</th>
                                     <th class="px-4 py-3">Actions</th>
                                 </tr>
                                 @forelse ($users as $user)
                                 <tr>

                                     <td class="align-middle">
                                         {{$user->firstName}}
                                     </td>
                                     <td class="align-middle">
                                         {{$user->lastName}}
                                     </td>
                                     <td class="align-middle">
                                         {{ $user->email}}
                                     </td>
                                     <td class="align-middle">
                                         {{ $user->phoneNumber}}
                                     </td>
                                     <td class="align-middle">
                                         {{ $user->gender}}
                                     </td>
                                     <td class="align-middle">
                                         {{ $user->dob}}
                                     </td>
                                     <td class="align-middle">
                                         <div class="flex items-center space-x-4 text-sm">

                                             <a href="{{route('changeUserStatus', $user->id)}}" @if( $user->status == 'active')
                                                 class="badge badge-success">{{ $user->status}}
                                                 @else
                                                 class="badge badge-danger">{{ $user->status}}
                                                 @endif
                                             </a>
                                         </div>
                                     </td>

                                     <td class="align-middle">

                                         <div class="dropdown">
                                             <a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Options</a>
                                             <div class="dropdown-menu">
                                                 <a href="{{route('getUpdateUser', $user->id)}}" class="dropdown-item has-icon"><i class="far fa-edit"></i> Edit</a>
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

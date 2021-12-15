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
                 <h1 class="text-3xl font-bold px-12 py-8 text-blue-700 text-upcase">List of users</h1>
                 <div class="card">

                     <div class="card-header">
                         <h1 class="text-2xl ">Users</h1>
                     </div>
                     <div class="card-body p-0">
                         <div class="table-responsive">
                             <table class="table table-striped " id="mytable">
                                 <tr>
                                     <th class="px-4 py-3 text-base font-bold">#</th>
                                     <th class="px-4 py-3 text-base font-bold">First Name</th>
                                     <th class="px-4 py-3 text-base font-bold">Last Name</th>
                                     <th class="px-4 py-3 text-base font-bold">User Email</th>
                                     <th class="px-4 py-3 text-base font-bold">User Phone Number</th>
                                     <th class="px-4 py-3 text-base font-bold">User Gender</th>
                                     <th class="px-4 py-3 text-base font-bold">User Dob</th>
                                     <th class="px-4 py-3 text-base font-bold">User Status</th>
                                     <th class="px-4 py-3 text-base font-bold">Actions</th>
                                 </tr>
                                 @php
                                 $i =0;
                                 @endphp
                                 @forelse ($users as $user)
                                 @php
                                 $i ++;
                                 @endphp
                                 <tr>
                                     <td class="align-middle px-4 text-xl">
                                         {{$i}}
                                     </td>
                                     <td class="align-middle px-4 text-xl">
                                         {{$user->firstName}}
                                     </td>
                                     <td class="align-middle px-4 text-xl">
                                         {{$user->lastName}}
                                     </td>
                                     <td class="align-middle px-4 text-xl">
                                         {{ $user->email}}
                                     </td>
                                     <td class="align-middle px-4 text-xl">
                                         {{ $user->phoneNumber}}
                                     </td>
                                     <td class="align-middle px-4 text-xl">
                                         {{ $user->gender}}
                                     </td>
                                     <td class="align-middle px-4 text-xl">
                                         {{ $user->dob}}
                                     </td>
                                     <td class="align-middle px-4 text-xl">
                                         <div class="flex items-center space-x-4 text-xl text-white text-bold text-base">

                                             <a href="{{route('changeUserStatus', Crypt::encrypt($user->id))}}" @if( $user->status == 'active')
                                                 class="badge badge-success">{{ $user->status}}
                                                 @else
                                                 class="badge badge-danger">{{ $user->status}}
                                                 @endif
                                             </a>
                                         </div>
                                     </td>

                                     <td class="align-middle px-4 text-base">

                                         <div class="dropdown">
                                             <a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Options</a>
                                             <div class="dropdown-menu">
                                                 <a href="{{route('getUpdateUser', Crypt::encrypt($user->id))}}" class="dropdown-item has-icon"><i class="far fa-edit"></i> Edit</a>
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








         <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

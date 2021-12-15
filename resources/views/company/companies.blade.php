 @extends('layouts.header')

 @section('content')
 <link href="{{asset('css/app.css') }}" rel="stylesheet">
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
                 <h4 class="text-4xl font-bold text-blue-600 font-italic px-8 py-12 ">List of Companies</h4>
                 <div class="card">
                     <div class="card-body p-0">
                         <div class="table-responsive">
                             <table class="table table-striped" id="example" class="display">
                                 <tr class="bg-blue-600">
                                     <th class="px-4 py-3 text-xl text-blue-white">#</th>
                                     <th class="px-4 py-3 text-xl text-blue-white">Company Name</th>
                                     <th class="px-4 py-3 text-xl text-blue-white">Company Status</th>
                                     <th class="px-4 py-3 text-xl text-blue-white">Company Location</th>
                                     <th class="px-4 py-3 text-xl text-blue-white">Owner Names</th>
                                     <th class="px-4 py-3 text-xl text-blue-white">Owner Email</th>
                                     <th class="px-8 py-3 text-xl text-blue-white">Owner Phone No</th>
                                     <th class="px-4 py-3 text-xl text-blue-white">Owner Gender</th>
                                     <th class="px-4 py-3 text-xl text-blue-white">Owner Dob</th>
                                     <th class="px-4 py-3 text-xl text-blue-white">Owner Status</th>
                                     <th class="px-4 py-3 text-xl text-blue-white">Actions</th>
                                 </tr>
                                 @forelse ($companies as $company)
                                 <tr>
                                     <td class="align-middle px-4 text-xl">
                                         {{$company->id}}
                                     </td>
                                     <td class="align-middle px-8 text-xl">
                                         {{$company->name}}
                                     </td>
                                     <td class="align-middle px-4 text-xl">
                                         <a href="{{route('changeCompanyStatus',Crypt::encrypt($company->id))}}" @if($company->status == 'active')
                                             class="badge badge-success">{{$company->status}}
                                             @else
                                             class="badge badge-danger">{{$company->status}}
                                             @endif
                                         </a>
                                     </td>
                                     <td class="align-middle px-4 text-xl">
                                         {{$company->location}}
                                     </td>
                                     <td class="align-middle px-4">
                                         {{$company->user->firstName}} {{$company->user->lastName}}
                                     </td>
                                     <td class="align-middle px-4 text-xl">
                                         {{$company->user->email}}
                                     </td>
                                     <td class="align-middle px-4 text-xl">
                                         {{$company->user->phoneNumber}}
                                     </td>
                                     <td class="align-middle px-4 text-xl">
                                         {{$company->user->gender}}
                                     </td>
                                     <td class="align-middle px-12 text-xl">
                                         {{$company->user->dob}}
                                     </td>

                                     <td class="align-middle px-4 text-xl">

                                         <div class="flex items-center space-x-4 text-xl">

                                             <a href="{{route('changeUserStatus',Crypt::encrypt($company->user->id))}}" @if($company->user->status == 'active')
                                                 class="badge badge-success">{{$company->user->status}}
                                                 @else
                                                 class="badge badge-danger">{{$company->user->status}}
                                                 @endif
                                             </a>
                                         </div>
                                     </td>
                                     <td class="align-middle text-base">

                                         <div class="dropdown">
                                             <a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Options</a>
                                             <div class="dropdown-menu">
                                                 <a href="{{route('getCompanyBranches',Crypt::encrypt($company->id))}}" class="dropdown-item has-icon"><i class="fas fa-eye"></i> View Branches
                                                 </a>
                                                 <a href="{{route('getChangeOwner',Crypt::encrypt($company->id))}}" class="dropdown-item has-icon"><i class="far fa-edit"></i> Change Owner</a>
                                                 <a href="{{route('getUpdateCompany',Crypt::encrypt($company->id))}}" class="dropdown-item has-icon"><i class="far fa-edit"></i> Edit</a>
                                                 <div class="dropdown-divider"></div>
                                                 <a href="{{route('deleteCompany',Crypt::encrypt($company->id))}}" class="dropdown-item has-icon text-danger"><i class="far fa-trash-alt"></i>
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


             <div class="fixed bottom-48 right-48 ">
                 <a style="align-items: right;" href="{{route('getAddCompany')}}" class="animate-pulse  py-8 bg-blue-600 text-xl text-white text-red-100 rounded-full px-8 fixed text-blue-600 hover:text-blue-700 transition duration-150 ease-in-out" data-bs-toggle="tooltip" data-bs-placement="left" title="Please add company !"><i class="fa fa-plus fa-2x" aria-hidden="true"></i></a>

             </div>
             @endsection

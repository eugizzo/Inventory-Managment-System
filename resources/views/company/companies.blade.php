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
                         <h4>List of Companies</h4>
                         <div style="float:right; position: relative;">
                             <a style="align-items: right;" href="{{route('getAddCompany')}}" class="btn btn-outline-primary">Register Company</a>
                         </div>
                     </div>
                     <div class="card-body p-0">
                         <div class="table-responsive">
                             <table class="table table-striped" id="example" class="display">
                                 <tr>
                                     <th class="px-4 py-3">Company Name</th>
                                     <th class="px-4 py-3">Company Status</th>
                                     <th class="px-4 py-3">Company Location</th>
                                     <th class="px-4 py-3">Owner Names</th>
                                     <th class="px-4 py-3">Owner Email</th>
                                     <th class="px-4 py-3">Owner Phone Number</th>
                                     <th class="px-4 py-3">Owner Gender</th>
                                     <th class="px-4 py-3">Owner Dob</th>
                                     <th class="px-4 py-3">Owner Status</th>
                                     <th class="px-4 py-3">Actions</th>
                                 </tr>
                                 @forelse ($companies as $company)
                                 <tr>
                                     <td class="align-middle">
                                         {{$company->name}}
                                     </td>
                                     <td class="align-middle">
                                         <a href="{{route('changeCompanyStatus',$company->id)}}" @if($company->status == 'active')
                                             class="badge badge-success">{{$company->status}}
                                             @else
                                             class="badge badge-danger">{{$company->status}}
                                             @endif
                                         </a>
                                     </td>
                                     <td class="align-middle">
                                         {{$company->location}}
                                     </td>
                                     <td class="align-middle">
                                         {{$company->user->firstName}} {{$company->user->lastName}}
                                     </td>
                                     <td class="align-middle">
                                         {{$company->user->email}}
                                     </td>
                                     <td class="align-middle">
                                         {{$company->user->phoneNumber}}
                                     </td>
                                     <td class="align-middle">
                                         {{$company->user->gender}}
                                     </td>
                                     <td class="align-middle">
                                         {{$company->user->dob}}
                                     </td>

                                     <td class="align-middle">

                                         <div class="flex items-center space-x-4 text-sm">

                                             <a href="{{route('changeUserStatus',$company->user->id)}}" @if($company->user->status == 'active')
                                                 class="badge badge-success">{{$company->user->status}}
                                                 @else
                                                 class="badge badge-danger">{{$company->user->status}}
                                                 @endif
                                             </a>
                                         </div>
                                     </td>
                                     <td class="align-middle">

                                         <div class="dropdown">
                                             <a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Options</a>
                                             <div class="dropdown-menu">
                                                 <a href="{{route('getCompanyBranches',$company->id)}}" class="dropdown-item has-icon"><i class="fas fa-eye"></i> View Branches
                                                 </a>
                                                 <a href="{{route('getChangeOwner',$company->id)}}" class="dropdown-item has-icon"><i class="far fa-edit"></i> Change Owner</a>
                                                 <a href="{{route('getUpdateCompany',$company->id)}}" class="dropdown-item has-icon"><i class="far fa-edit"></i> Edit</a>
                                                 <div class="dropdown-divider"></div>
                                                 <a href="{{route('deleteCompany',$company->id)}}" class="dropdown-item has-icon text-danger"><i class="far fa-trash-alt"></i>
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
         <script>
             $(document).ready(function() {
                 $('#example').DataTable();
             });
         </script>

         @endsection
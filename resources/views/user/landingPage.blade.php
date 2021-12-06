 @extends('layouts.header')

 @section('content')
 <div class="main-content">
     <section class="section">
         <div class="row">
             <div class="col-xl-4 col-md-4">
                 <div class="card card-stats">
                     <!-- Card body -->
                     <div class="card-body">
                         <div class="row">
                             <div class="col">
                                 <h5 class="card-title text-uppercase text-muted mb-0">Total Users</h5>
                                 <span class="h2 font-weight-bold mb-0">{{$users}}</span>
                             </div>
                             <div class="col-auto">
                                 <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                     <i class="ni ni-single-02 "></i>
                                 </div>
                             </div>
                         </div>
                         <p class="mt-3 mb-0 text-sm">
                             <span class="text-success mr-2"></span>
                             <span class="text-nowrap"></span>
                         </p>
                     </div>
                 </div>
             </div>
             <div class="col-xl-4 col-md-4">
                 <div class="card card-stats">
                     <!-- Card body -->
                     <div class="card-body">
                         <div class="row">
                             <div class="col">
                                 <h5 class="card-title text-uppercase text-muted mb-0">Total Active Users</h5>
                                 <span class="h2 font-weight-bold mb-0">{{$activeUser}}</span>
                             </div>
                             <div class="col-auto">
                                 <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                     <i class="ni ni-bullet-list-47 text-default"></i>
                                 </div>
                             </div>
                         </div>
                         <p class="mt-3 mb-0 text-sm">
                             <span class="text-success mr-2"></span>
                             <span class="text-nowrap"></span>
                         </p>
                     </div>
                 </div>
             </div>
             <div class="col-xl-4 col-md-4">
                 <div class="card card-stats">
                     <!-- Card body -->
                     <div class="card-body">
                         <div class="row">
                             <div class="col">
                                 <h5 class="card-title text-uppercase text-muted mb-0">Total inActive Users</h5>
                                 <span class="h2 font-weight-bold mb-0">{{$inActiveUser}}</span>
                             </div>
                             <div class="col-auto">
                                 <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                     <i class="ni ni-single-02 "></i>
                                 </div>
                             </div>
                         </div>
                         <p class="mt-3 mb-0 text-sm">
                             <span class="text-success mr-2"></span>
                             <span class="text-nowrap"></span>
                         </p>
                     </div>
                 </div>
             </div>
         </div>
         <div class="row">

             <div class="col-xl-4 col-md-4">
                 <div class="card card-stats">
                     <!-- Card body -->
                     <div class="card-body">
                         <div class="row">
                             <div class="col">
                                 <h5 class="card-title text-uppercase text-muted mb-0">Total Companies</h5>
                                 <span class="h2 font-weight-bold mb-0">{{$companies}}</span>
                             </div>
                             <div class="col-auto">
                                 <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                     <i class="ni ni-bullet-list-67 text-default"></i>
                                 </div>
                             </div>
                         </div>
                         <p class="mt-3 mb-0 text-sm">
                             <span class="text-success mr-2"></span>
                             <span class="text-nowrap"></span>
                         </p>
                     </div>
                 </div>
             </div>
             <div class="col-xl-4 col-md-4">
                 <div class="card card-stats">
                     <!-- Card body -->
                     <div class="card-body">
                         <div class="row">
                             <div class="col">
                                 <h5 class="card-title text-uppercase text-muted mb-0">Total Active Companies</h5>
                                 <span class="h2 font-weight-bold mb-0">{{$activeCompanies}}</span>
                             </div>
                             <div class="col-auto">
                                 <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                     <i class="ni ni-single-02 "></i>
                                 </div>
                             </div>
                         </div>
                         <p class="mt-3 mb-0 text-sm">
                             <span class="text-success mr-2"></span>
                             <span class="text-nowrap"></span>
                         </p>
                     </div>
                 </div>
             </div>
             <div class="col-xl-4 col-md-4">
                 <div class="card card-stats">
                     <!-- Card body -->
                     <div class="card-body">
                         <div class="row">
                             <div class="col">
                                 <h5 class="card-title text-uppercase text-muted mb-0">Total Inactive Companies</h5>
                                 <span class="h2 font-weight-bold mb-0">{{$inActiveCompanies}}</span>
                             </div>
                             <div class="col-auto">
                                 <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                     <i class="ni ni-single-02 "></i>
                                 </div>
                             </div>
                         </div>
                         <p class="mt-3 mb-0 text-sm">
                             <span class="text-success mr-2"></span>
                             <span class="text-nowrap"></span>
                         </p>
                     </div>
                 </div>
             </div>

             <div class="col-xl-4 col-md-4">
                 <div class="card card-stats">
                     <!-- Card body -->
                     <div class="card-body">
                         <div class="row">
                             <div class="col">
                                 <h5 class="card-title text-uppercase text-muted mb-0">Total Categories</h5>
                                 <span class="h2 font-weight-bold mb-0">{{$categories}}</span>
                             </div>
                             <div class="col-auto">
                                 <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                     <i class="ni ni-single-02 "></i>
                                 </div>
                             </div>
                         </div>
                         <p class="mt-3 mb-0 text-sm">
                             <span class="text-success mr-2"></span>
                             <span class="text-nowrap"></span>
                         </p>
                     </div>
                 </div>
             </div>

             <div class="col-xl-4 col-md-4">
                 <div class="card card-stats">
                     <!-- Card body -->
                     <div class="card-body">
                         <div class="row">
                             <div class="col">
                                 <h5 class="card-title text-uppercase text-muted mb-0">Total Brands</h5>
                                 <span class="h2 font-weight-bold mb-0">{{$brands}}</span>
                             </div>
                             <div class="col-auto">
                                 <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                     <i class="ni ni-single-02 "></i>
                                 </div>
                             </div>
                         </div>
                         <p class="mt-3 mb-0 text-sm">
                             <span class="text-success mr-2"></span>
                             <span class="text-nowrap"></span>
                         </p>
                     </div>
                 </div>
             </div>

             <div class="col-xl-4 col-md-4">
                 <div class="card card-stats">
                     <!-- Card body -->
                     <div class="card-body">
                         <div class="row">
                             <div class="col">
                                 <h5 class="card-title text-uppercase text-muted mb-0">Total Products</h5>
                                 <span class="h2 font-weight-bold mb-0">{{$products}}</span>
                             </div>
                             <div class="col-auto">
                                 <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                     <i class="ni ni-single-02 "></i>
                                 </div>
                             </div>
                         </div>
                         <p class="mt-3 mb-0 text-sm">
                             <span class="text-success mr-2"></span>
                             <span class="text-nowrap"></span>
                         </p>
                     </div>
                 </div>
             </div>

         </div>
 </div>
 </div>


 @endsection

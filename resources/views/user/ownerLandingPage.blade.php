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

                                    <h5 class=" px-2 card-title text-uppercase  mb-0 text-yellow-600">Total Branches</h5>   
                                    <span style="font-size: 48px;" class="text-blue-600 px-12">
                                    <i class="fa fa-code-branch fa-x"></i>
                                    </span>
                                    <span class="px-12 text-4xl text-blue-500 h2 font-weight-bold mb-0">{{$branches}}</span>
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

                            <h5 class=" px-2 card-title text-uppercase  mb-0 text-yellow-600">Total Categories</h5>   
                            <span style="font-size: 48px;" class="text-blue-600 px-12">
                            <i class="fa fa-arrows-alt fa-x"></i>
                            </span>
                            <span class="px-12 text-4xl text-blue-500 h2 font-weight-bold mb-0">{{$categories}}</span>
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

                                <h5 class=" px-2 card-title text-uppercase mb-0 text-yellow-600">Total Brands</h5>   
                                <span style="font-size: 48px;" class="text-blue-600 px-12">
                                <i class="fa fa-clipboard fa-x"></i>
                                </span>
                                <span class="px-12 text-4xl text-blue-500 h2 font-weight-bold mb-0">{{$brands}}</span>
                            
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

                                 <h5 class=" px-2 card-title text-uppercase  mb-0 text-yellow-600">Total Products</h5>   
                             <span style="font-size: 48px;" class="text-blue-600 px-12">
                             <i class="fa fa-cart-plus fa-x"></i>
                             </span>
                                 <span class="px-12 text-4xl text-blue-500 h2 font-weight-bold mb-0">{{$products}}</span>
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
               
                                 <h5 class=" px-2 card-title text-uppercase  mb-0 text-yellow-600">Top Selling Product</h5>
                                 @if($topSelling)
                                 <span style="font-size: 48px;" class="text-blue-600 px-12">
                             <i class="fa  fa-cart-arrow-down fa-x"></i>
                             </span>
                                 <span class="px-4 text-blue-600 h2 font-weight-bold mb-0">{{$topSelling->name}}</span>
                                 @else
                                 <span class="px-4 text-blue-600 h2 font-weight-bold mb-0">No Product</span>
                                 @endif
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
     </section>
 </div>


 @endsection

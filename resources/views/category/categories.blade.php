<link href="/resources/css/button.css">
<!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
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

                <div class=" d-flex justify-content-between">
                    <h4 class="text-4xl font-bold text-blue-600 font-italic px-8 py-12">List of Categories</h4>

                </div>
                <div class="card">

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class=" table table-striped table-responsive" id="example">
                                <tr>
                                    <th class="px-4 py-3 text-2xl font-bold ">#</th>
                                    <th class="px-4 py-3 text-2xl font-bold ">Category Name</th>
                                    <th class="px-4 py-3 text-2xl font-bold ">Category Unity</th>
                                    <th class="px-4 py-3 text-2xl font-bold ">Date</th>
                                    <th class="px-4 py-3 text-2xl font-bold ">Actions</th>
                                </tr>
                                @forelse ($categories as $category)
                                <tr>
                                    <td class=" px-4 text-xl ">
                                        {{$category->id}}
                                    </td>
                                    <td class=" px-4 text-xl ">
                                        {{$category->name}}
                                    </td>
                                    <td class="px-4 text-xl">
                                        {{$category->unity}}
                                    </td>
                                    <td class="text-xl">
                                        {{$category->created_at}}
                                    </td>

                                    <td class="align-middle">
                                        <div class="dropdown">
                                            <a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle text-xl">Options</a>
                                            <div class="dropdown-menu">
                                                <a href="{{route('getUpdateCategory',Crypt::encrypt($category->id))}}" class="dropdown-item has-icon"><i class="far fa-edit"></i> Edit</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="{{route('deleteCategory',Crypt::encrypt($category->id))}}" class="dropdown-item has-icon text-danger"><i class="far fa-trash-alt"></i>
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
        <div class="fixed bottom-48 right-48 ">
            <a style="align-items: right;" href="{{route('getAddCategory')}}" class="animate-pulse  py-8 bg-blue-600 text-xl text-white text-red-100 rounded-full px-8 fixed text-blue-600 hover:text-blue-700 transition duration-150 ease-in-out" data-bs-toggle="tooltip" data-bs-placement="left" title="Please add category !"><i class="fa fa-plus fa-2x" aria-hidden="true"></i></a>

        </div>
        @endsection
        <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

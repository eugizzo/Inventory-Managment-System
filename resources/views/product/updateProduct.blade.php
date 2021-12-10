@extends('layouts.header')
@section('content')
<link rel="stylesheet" href="/style.css">

<form class="signup-form" action="{{route('updateProduct')}}" method="post">
    @CSRF

    <!-- form header -->
    <div class="form-header">
        <h1>Update Product</h1>
    </div>

    <!-- form body -->
    <div class="form-body">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has($msg))
        <div class="alert alert-{{ $msg }} alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{ Session::get($msg) }}
        </div>
        @endif
        @endforeach
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="horizontal-group">
            <input name="id" value="{{$product->id}}" hidden required="required" />

            <div class="form-group left">
                <label for="firstname" class="label-title">Product name *</label>
                <input name="name" value="{{$product->name}}" type="text" id="firstname" class="form-input" placeholder="enter your Product name" required="required" />
            </div>
            <div class="form-group right">
                <label class="label-title">Categories</label>
                <div>
                    <select class="form-control select2 py-1" name="category_id">
                        @foreach($categories as $category)
                        @if($product->category_id == $category->id)
                        <option value="{{$category->id}}" selected>{{$category->name}} in {{$category->unity}} </option>
                        @else
                        <option value="{{$category->id}}">{{$category->name}} in {{$category->unity}} </option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="horizontal-group">
            <div class="form-group right">
                <label class="label-title">Brands</label>
                <div>
                    <select class="form-control select2 py-1" name="brand_id">
                        @foreach($brands as $brand)
                        @if($product->brand_id == $brand->id)
                        <option value="{{$brand->id}}" selected>{{$brand->name}}</option>
                        @else
                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>
        </div>




        <!-- // -->






        <!-- form-footer -->
        <div class="form-footer">
            <span>* required</span>
            <button type="submit" class="btn">Update</button>
        </div>

</form>

@endsection

@extends('layouts.header')
@section('content')
<link rel="stylesheet" href="/style.css">

<form class="signup-form" action="{{route('updateBrand')}}" method="post">
    @CSRF

    <!-- form header -->
    <div class="form-header">
        <h1>Register Brand</h1>
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

        <input name="id" value="{{$brand->id}}" hidden required="required">

        <div class="form-group">
            <label for="name" class="label-title">Name*</label>
            <input name="name" value="{{$brand->name}}" type="name" id="name" class="form-input" placeholder="enter your brand name" required="required">
        </div>









        <!-- form-footer -->
        <div class="form-footer">
            <span>* required</span>
            <button type="submit" class="btn">Update</button>
        </div>

</form>

@endsection
@extends('layouts.header')
@section('content')
<link rel="stylesheet" href="/style.css">

<form class="signup-form" action="{{route('addCategory')}}" method="post">
    @CSRF

    <!-- form header -->
    <div class="form-header">
        <h1>Register Category</h1>
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
            <div class="form-group left">
                <label for="firstname" class="label-title">Category name *</label>
                <input name="name" value="{{old('name')}}" type="text" id="firstname" class="form-input" placeholder="enter your Category name" required="required" />
            </div>
            <div class="form-group right">
                <label for="lastname" class="label-title">Measure unit *</label>
                <input name="unity" value="{{old('unity')}}" type="text" id="lastname" class="form-input" placeholder="enter your Category Unity " />
            </div>
        </div>




        <!-- // -->






        <!-- form-footer -->
        <div class="form-footer">
            <span>* required</span>
            <button type="submit" class="btn">Register</button>
        </div>

</form>

@endsection
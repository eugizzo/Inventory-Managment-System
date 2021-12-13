@extends('layouts.header')
@section('content')
<link rel="stylesheet" href="/style.css">

<form class="signup-form" action="{{route('addCompany')}}" method="post">
    @CSRF

    <!-- form header -->
    <div class="form-header">
        <h1>Register Company</h1>
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
                <label for="firstname" class="label-title">Company name *</label>
                <input name="name" value="{{old('name')}}" type="text" id="firstname" class="form-input" placeholder="" required="required" />
            </div>
            <div class="form-group right">
                <label for="lastname" class="label-title">Company Location *</label>
                <input name="location" value="{{old('location')}}" type="text" id="lastname" class="form-input" placeholder="" />
            </div>
        </div>

        <!-- Firstname and Lastname -->
        <div class="horizontal-group">
            <div class="form-group left">
                <label for="firstname" class="label-title">Owner First name *</label>
                <input name="firstName" value="{{old('firstName')}}" type="text" id="firstname" class="form-input" placeholder="" required="required" />
            </div>

            <div class="form-group right">
                <label for="lastname" class="label-title">Owner Last name *</label>
                <input name="lastName" value="{{old('lastName')}}" type="text" id="lastname" class="form-input" placeholder="" required="required" />
            </div>
        </div>

        <!-- Email -->
        <div class="horizontal-group">
            <div class="form-group left">
                <label for="email" class="label-title">Owner Email*</label>
                <input name="email" value="{{old('email')}}" type="email" id="email" class="form-input" placeholder="" required="required">
            </div>
            <div class="form-group right">
                <label for="lastname" class="label-title">Owner Phone Number *</label>
                <input name="phoneNumber" value="{{old('phoneNumber')}}" type="text" id="lastname" class="form-input" placeholder="" require />
            </div>
        </div>
        <div class="form-group">
        </div>

        <!-- // -->


        <!-- Passwrod and confirm password -->
        <div class="horizontal-group">
            <div class="form-group left">
                <label class="label-title">Owner Gender*:</label>
                <div class="input-group flex space-x-8">
                    <label for="male"><input type="radio" name="gender" value="male" id="male" @if(old('gender')=="male" ) checked @endif> Male</label>
                    <label for="female"><input type="radio" name="gender" value="female" id="female" @if(old('gender')=="female" ) checked @endif> Female</label>
                </div>
            </div>
            <div class="form-group right">
                <label for="experience" class="label-title">Owner DOB *</label>
                <input name="dob" value="{{old('dob')}}" type="date" class="form-input">
            </div>
        </div>



        <!-- form-footer -->
        <div class="form-footer">
            <span>* required</span>
            <button type="submit" class="btn">Register</button>
        </div>

</form>

@endsection
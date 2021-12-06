@extends('layouts.header')
@section('content')
<link rel="stylesheet" href="/style.css">

<form class="signup-form" action="{{route('updateUser')}}" method="post">
    @CSRF

    <!-- form header -->
    <div class="form-header">
        <h1>Update User</h1>
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



        <!-- Firstname and Lastname -->
        <input name="id" value="{{$user->id}}" hidden required="required" />
        <div class="horizontal-group">
            <div class="form-group left">
                <label for="firstname" class="label-title">user First name *</label>
                <input name="firstName" value="{{$user->firstName}}" type="text" id="firstname" class="form-input" placeholder="enter your first name" required="required" />
            </div>

            <div class="form-group right">
                <label for="lastname" class="label-title">user Last name *</label>
                <input name="lastName" value="{{$user->lastName}}" type="text" id="lastname" class="form-input" placeholder="enter your last name" required="required" />
            </div>
        </div>

        <!-- Email -->
        <div class="horizontal-group">
            <div class="form-group left">
                <label for="email" class="label-title">user Email*</label>
                <input name="email" value="{{$user->email}}" type="email" id="email" class="form-input" placeholder="enter your email" required="required">
            </div>
            <div class="form-group right">
                <label for="lastname" class="label-title">user Phone Number *</label>
                <input name="phoneNumber" value="{{$user->phoneNumber}}" type="text" id="lastname" class="form-input" placeholder="enter your last name" require />
            </div>
        </div>
        <div class="form-group">
        </div>

        <!-- // -->


        <!-- Passwrod and confirm password -->
        <div class="horizontal-group">
            <div class="form-group left">
                <label class="label-title">user Gender*:</label>
                <div class="input-group">
                    <label for="male"><input type="radio" name="gender" value="male" id="male" @if($user->gender =="male" ) checked @endif> Male</label>
                    <label for="female"><input type="radio" name="gender" value="female" id="female" @if($user->gender =="female" ) checked @endif> Female</label>
                </div>
            </div>
            <div class="form-group right">
                <label for="experience" class="label-title">user DOB *</label>
                <input name="dob" value="{{$user->dob}}" type="date" class="form-input">
            </div>
        </div>



        <!-- form-footer -->
        <div class="form-footer">
            <span>* required</span>
            <button type="submit" class="btn">Update</button>
        </div>

</form>

@endsection
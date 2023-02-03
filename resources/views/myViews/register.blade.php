@extends('mylayouts.master')

@section('login_logout')
<title>
    @section('title','Register')

</title>
<div class="login-form" >
    <form action="{{ route('register') }}" method="post">
        @csrf

        {{-- @error('terms')
            <small class="text-danger">{{$message}}</small>
        @enderror --}}
        <div class="form-group">
            <label>Username</label>
            <input class="au-input au-input--full" type="text" name="name" placeholder="Username">
            @error('name')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label>Email Address</label>
            <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
            @error('email')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Phone</label>
            <input class="au-input au-input--full" type="number" name="phone" placeholder="09 xxxxx">
            @error('phone')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Address</label>
            <input class="au-input au-input--full" type="text" name="address" placeholder="Address">
            @error('address')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>



        <div class="form-group">
            <label>Password</label>
            <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
            @error('password')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Password Confirmation</label>
            <input class="au-input au-input--full" type="password" name="password_confirmation" placeholder="Password Confirmation">
            @error('password_confirmation')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>


        <button class="au-btn au-btn--block au-btn--green m-b-20" >register</button>

    </form>
    <div class="register-link">
        <p>
            Already have account?
            <a href="{{ route('auth#loginPage') }}">Sign In</a>
        </p>
    </div>
</div>
@endsection
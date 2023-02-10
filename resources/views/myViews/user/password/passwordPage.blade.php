@extends('myViews.user.layouts.userMaster')

@section('content')
<title>@section('title','Password')</title>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            {{-- <div class="row">
                <div class="col-3 offset-8">
                    <a href="{{route('admin#listPage')}}"><button class="btn bg-dark text-white my-3">List</button></a>
                </div>
            </div> --}}

            <div class="col-lg-6 offset-3">
                <div class="card w-75 m-auto">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center title-2">User Change Password</h3>
                        </div>


                        <hr>

                        <div class="">

                           @if (session('changePassword'))
                           <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{session('changePassword')}}</strong> You should check  Your account list below.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                           @endif

                        </div>


                        <form action="{{route('user#passwordChange',Auth::user()->id)}}" method="post" novalidate="novalidate">
                            @csrf
                            <div class="form-group mb-2">
                                <label for="cc-payment" class="control-label mb-3">Old Password</label>
                                <input id="cc-pament" name="passwordOld" type="password"  class="form-control rounded @error('passwordOld') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Enter old Password....">
                                @error('passwordOld')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror

                                @if (session('noSameOldPassword'))
                                    <small class="text-danger">{{session('noSameOldPassword')}}</small>
                                @endif


                            </div>

                            <div class="form-group mb-2">
                                <label for="cc-payment" class="control-label mb-3">New Password</label>
                                <input id="cc-pament" name="passwordNew" type="password"  class="form-control rounded @error('passwordNew') is-invalid @enderror " aria-required="true" aria-invalid="false" placeholder="Enter New Password....">
                                @error('passwordNew')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>


                            <div class="form-group mb-2">
                                <label for="cc-payment" class="control-label mb-3">Confirm Password</label>
                                <input id="cc-pament" name="passwordConfirm" type="password"  class="form-control rounded @error('passwordConfirm') is-invalid @enderror " aria-required="true" aria-invalid="false" placeholder="Enter Confirm Password....">
                                @error('passwordConfirm')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="" >
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block w-100 mt-2 mb-2">
                                    <span id="payment-button-amount ">Change Password
                                        <i class="fa-solid fa-key"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection

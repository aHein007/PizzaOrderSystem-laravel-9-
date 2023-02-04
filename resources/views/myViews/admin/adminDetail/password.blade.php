!@extends('myViews.admin.adminLayout.app')


@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            {{-- <div class="row">
                <div class="col-3 offset-8">
                    <a href="{{route('admin#listPage')}}"><button class="btn bg-dark text-white my-3">List</button></a>
                </div>
            </div> --}}

            <div class="col-lg-6 offset-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center title-2">Password Update</h3>
                        </div>


                        <hr>


                        <form action="{{route('admin#changePassword')}}" method="post" novalidate="novalidate">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="cc-payment" class="control-label mb-3">Old Password</label>
                                <input id="cc-pament" name="oldPassword" type="password"  class="form-control rounded  @error('oldPassword') is-invalid @enderror @if(session('password')) is-invalid @endif" aria-required="true" aria-invalid="false" placeholder="Enter old Password....">
                                @error('oldPassword')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                                @if (session('password'))
                                    <small class="text-danger ">{{session('password')}}</small>
                                @endif


                            </div>

                            <div class="form-group mb-3">
                                <label for="cc-payment" class="control-label mb-3">New Password</label>
                                <input id="cc-pament" name="newPassword" type="password"  class="form-control rounded  @error('newPassword') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Enter New Password....">
                               @error('newPassword')
                                    <small class="text-danger  mt-3">{{$message}}</small>
                               @enderror
                            </div>


                            <div class="form-group mb-3">
                                <label for="cc-payment" class="control-label mb-3">Confirm Password</label>
                                <input id="cc-pament" name="confirmPassword" type="password"  class="form-control rounded @error('confirmPassword') is-invalid @enderror " aria-required="true" aria-invalid="false" placeholder="Enter Confirm Password....">
                               @error('confirmPassword')
                                    <small class="text-danger mt-3">{{$message}}</small>
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


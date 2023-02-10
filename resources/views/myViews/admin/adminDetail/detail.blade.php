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

            <div class="col-lg-8 offset-2">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center title-2">Admin Info</h3>
                        </div>


                        <hr>
                        <div class="">
                            @if (session('updateSuccess'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{session('updateSuccess')}}</strong> You should check in on some of Admin info below.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>
                            @endif
                        </div>

                       <div class="row">
                            <div class="col-4 offset-1">
                                <a href="#">
                                    @if (Auth::user()->image != null)
                                    <td>
                                         <img src="{{asset('storage/' . Auth::user()->image)}}" alt="" width="250px" class="mt-3">
                                      </td>
                                    @elseif(Auth::user()->gender == 'female')
                                    <td>
                                         <img src="{{asset('image/default_female.jpg'  )}}" alt=""  width="250px" class="mt-3">
                                     </td>
                                     @else
                                     <td>
                                         <img src="{{asset('image/default_image.jpg'  )}}" alt=""  width="250px" class="mt-3">
                                     </td>
                                    @endif
                                 </a>
                                 <div class="text-center">Role - {{Auth::user()->role}}</div>
                            </div>
                            <div class="col-6 offset-1">
                                    <div class="info-container">
                                        <div class="m-3 ">
                                            <label for=""><i class="fa-solid fa-user-pen me-2"></i> Name</label> : {{Auth::user()->name}}
                                        </div>
                                        <div class="m-3 ">
                                            <label for=""><i class="fa-solid fa-envelope me-2"></i> Eamil</label> : {{Auth::user()->email}}
                                        </div>
                                        <div class="m-3 ">
                                            <label for=""><i class="fa-solid fa-envelope me-2"></i> Gender</label> : {{Auth::user()->gender}}
                                        </div>
                                        <div class="m-3 ">
                                            <label for=""><i class="fa-solid fa-phone me-2"></i> Phone</label> : {{Auth::user()->phone}}
                                        </div>
                                        <div class="m-3 ">
                                            <label for=""><i class="fa-solid fa-map-location-dot me-2"></i>Address</label> : {{Auth::user()->address}}
                                        </div>
                                        <div class="m-3 ">
                                            <label for=""><i class="fa-solid fa-calendar-day me-2"></i> Join Date</label> : {{Auth::user()->created_at->format('j / m / Y')}}
                                        </div>

                                    </div>

                            </div>

                            <a href="{{route('admin#editPage')}}">
                                <div class="edit-button mt-4 text-center">
                                    <button class="btn btn-dark px-3"> <i class="fa-solid fa-file-pen me-2"></i> Edit Profile</button>
                                </div>
                            </a>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


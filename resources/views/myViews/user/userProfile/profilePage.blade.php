@extends('myViews.user.layouts.userMaster')

@section('content')
<title>@section('title','Profile')</title>

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
                            <h3 class="text-center title-2">User Account</h3>
                        </div>


                        <hr>

                        @if (session('updateSuccess'))
                           <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{session('updateSuccess')}}</strong> You should check  Your account list below.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                           @endif

                    <form action="{{route('user#updateProfile',$userData->id)}}" enctype="multipart/form-data" method="post">
                        @csrf
                       <div class="row">

                            <div class="col-4 offset-1">
                                <a href="#" class="">
                                    @if ($userData->image != null)
                                    <td>
                                         <img src="{{asset('storage/' . $userData->image)}}" alt="" width="250px" class="mt-4 ms-4">
                                      </td>
                                    @elseif($userData->gender == 'female')
                                    <td>
                                         <img src="{{asset('image/default_female.jpg'  )}}" alt="" width="250px" class="mt-4 ms-4">
                                     </td>
                                     @else
                                     <td>
                                         <img src="{{asset('image/default_image.jpg'  )}}" alt="" width="250px" class="mt-4 ms-4">
                                     </td>
                                    @endif
                                 </a>

                                 <div class="text-center mt-3">Role - {{$userData->role}}</div>

                                 <div class="m-3 mt-4">
                                    <input type="file"  name="image" class="form-control rounded mb-2" >
                                    @error('image')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>

                                 <div class="edit-button text-center mt-5">
                                    <button class="btn btn-dark px-2" type="submit"> <i class="fa-solid fa-file-pen me-2"></i> Update Profile</button>
                                </div>
                            </div>

                            <div class="col-6 ">

                                    <div class="info-container">
                                        <div class="m-3 ">
                                            <label for=""><i class="fa-solid fa-user-pen me-2 mb-2"></i> Name</label>
                                            <input type="text"  name="name" class="form-control rounded  mb-2 @error('name') is-invalid @enderror" value="{{old('name',$userData->name)}}">
                                            @error('name')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                        <div class="m-3 ">
                                            <label for=""><i class="fa-solid fa-envelope me-2 mb-2"></i> Eamil</label>
                                            <input type="text"  name="email"class="form-control rounded mb-2  @error('email') is-invalid @enderror" value="{{old('email',$userData->email)}}">
                                            @error('email')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>


                                        <div class="m-3 ">
                                            <label for=""><i class="fa-solid fa-venus-mars  me-2 mb-2"></i>Gender</label>
                                            <select name="gender" class="form-select " >
                                                <option value="">Choose Gender...</option>
                                                <option value="male" @if($userData->gender == 'male') selected @endif>Male</option>
                                                <option value="female" @if($userData->gender == 'female') selected  @endif>Female</option>
                                                @error('gender')
                                                    <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </select>
                                        </div>



                                        <div class="m-3 ">
                                            <label for=""><i class="fa-solid fa-phone me-2 mb-2"></i> Phone</label>
                                            <input type="text" name="phone" class="form-control rounded mb-2  @error('phone') is-invalid @enderror" value="{{old('phone',$userData->phone)}}">
                                            @error('phone')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                        <div class="m-3 ">
                                            <label for=""><i class="fa-solid fa-map-location-dot me-2 mb-2"></i>Address</label>
                                            <textarea name="address"  cols="30" rows="5" class="form-control rounded mb-2  @error('address') is-invalid @enderror">{{old('address',$userData->address)}}</textarea>
                                            @error('address')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>


                                    </div>



                            </div>




                       </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection

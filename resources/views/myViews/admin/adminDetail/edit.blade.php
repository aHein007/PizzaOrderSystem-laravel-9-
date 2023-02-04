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
                            <h3 class="text-center title-2">Admin Account</h3>
                        </div>


                        <hr>

                    <form action="{{route('admin#edit',Auth::user()->id)}}" enctype="multipart/form-data" method="post">
                        @csrf
                       <div class="row">

                            <div class="col-4 offset-1">
                                <a href="#">
                                    @if (Auth::user()->image == null)
                                      <img src="{{asset('image/default_image.jpg')}}" class=" rounded" alt="">
                                    @else
                                        <img src="{{asset('storage/'.Auth::user()->image)}}" alt="John Doe" />
                                    @endif
                                 </a>

                                 <div class="text-center">Role - {{Auth::user()->role}}</div>

                                 <div class="m-3 mt-4">
                                    <input type="file"  name="image" class="form-control rounded" >
                                </div>

                                 <div class="edit-button text-center mt-5">
                                    <button class="btn btn-dark px-2" type="submit"> <i class="fa-solid fa-file-pen me-2"></i> Update Profile</button>
                                </div>
                            </div>

                            <div class="col-6 ">

                                    <div class="info-container">
                                        <div class="m-3 ">
                                            <label for=""><i class="fa-solid fa-user-pen me-2 mb-3"></i> Name</label>
                                            <input type="text"  name="name" class="form-control rounded" value="{{old('name',Auth::user()->name)}}">
                                        </div>
                                        <div class="m-3 ">
                                            <label for=""><i class="fa-solid fa-envelope me-2 mb-3"></i> Eamil</label>
                                            <input type="text"  name="email"class="form-control rounded" value="{{old('email',Auth::user()->email)}}">
                                        </div>


                                        <div class="m-3 ">
                                            <label for=""><i class="fa-solid fa-venus-mars  me-2 mb-3"></i>Gender</label>
                                            <select name="gender" class="form-select " >
                                                <option value="male" @if(Auth::user()->gender == 'male') selected @endif>Male</option>
                                                <option value="female" @if(Auth::user()->gender == 'female') selected  @endif>Female</option>
                                            </select>
                                        </div>



                                        <div class="m-3 ">
                                            <label for=""><i class="fa-solid fa-phone me-2 mb-3"></i> Phone</label>
                                            <input type="text" name="phone" class="form-control rounded" value="{{old('phone',Auth::user()->phone)}}">
                                        </div>
                                        <div class="m-3 ">
                                            <label for=""><i class="fa-solid fa-map-location-dot me-2 mb-3"></i>Address</label>
                                            <textarea name="address"  cols="30" rows="5" class="form-control rounded">{{old('address',Auth::user()->address)}}</textarea>
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


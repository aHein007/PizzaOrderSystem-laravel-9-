!@extends('myViews.admin.adminLayout.app')


@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class=" ms-3 pt-3">
                <i class="cursor-pointer fa-solid fa-arrow-left-long " onclick="history.back()"></i>
            </div>

            <div class="col-lg-8 offset-2">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center title-2">Change Role</h3>
                        </div>


                        <hr>

                    <form action="{{route('admin#changeRole',$account->id)}}" enctype="multipart/form-account" method="post">
                        @csrf
                       <div class="row">

                            <div class="col-4 offset-1">
                                <a href="#">
                                    @if ($account->image != null)
                                    <td>
                                         <img src="{{asset('storage/' . $account->image)}}" alt="" width="250px" class="mt-4">
                                      </td>
                                    @elseif($account->gender == 'female')
                                    <td>
                                         <img src="{{asset('image/default_female.jpg'  )}}" alt="" width="250px" class="mt-4">
                                     </td>
                                     @else
                                     <td>
                                         <img src="{{asset('image/default_image.jpg'  )}}" alt="" width="250px" class="mt-4">
                                     </td>
                                    @endif
                                </a>


                                <div class="row">
                                    <label for="" class="m-auto text-center mt-4 mb-3">Role</label>
                                    <select name="changeRole" class="form-select" id="">
                                        <option value="admin" @if($account->role =='admin') selected @endif>Admin</option>
                                        <option value="user" @if($account->id == 'user') selected @endif>User</option>
                                    </select>
                                </div>


                                 <div class="edit-button text-center mt-5">
                                    <button class="btn btn-dark px-2" type="submit"> <i class="fa-solid fa-file-pen me-2"></i>Change Role</button>
                                </div>
                            </div>

                            <div class="col-6 ">

                                    <div class="info-container">
                                        <div class="m-3 ">
                                            <label for=""><i class="fa-solid fa-user-pen me-2 mb-2"></i> Name</label>
                                            <input type="text"  disabled   name="name" class="form-control rounded  mb-2 @error('name') is-invalid @enderror" value="{{old('name',$account->name)}}">
                                            @error('name')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                        <div class="m-3 ">
                                            <label for=""><i class="fa-solid fa-envelope me-2 mb-2"></i> Eamil</label>
                                            <input type="text"  disabled   name="email"class="form-control rounded mb-2  @error('email') is-invalid @enderror" value="{{old('email',$account->email)}}">
                                            @error('email')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>


                                        <div class="m-3 ">
                                            <label for=""><i class="fa-solid fa-venus-mars  me-2 mb-2"></i>Gender</label>
                                            <select name="gender "  disabled   class="form-select " >
                                                <option value="">Choose Gender...</option>
                                                <option value="male" @if($account->gender == 'male') selected @endif>Male</option>
                                                <option value="female" @if($account->gender == 'female') selected  @endif>Female</option>
                                                @error('gender')
                                                    <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </select>
                                        </div>



                                        <div class="m-3 ">
                                            <label for=""><i class="fa-solid fa-phone me-2 mb-2"></i> Phone</label>
                                            <input type="text" disabled  name="phone" class="form-control rounded mb-2   @error('phone') is-invalid @enderror" value="{{old('phone',$account->phone)}}">
                                            @error('phone')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                        <div class="m-3 ">
                                            <label for=""><i class="fa-solid fa-map-location-dot me-2 mb-2"></i>Address</label>
                                            <textarea  disabled name="address"  cols="30" rows="5" class="form-control  rounded mb-2  @error('address') is-invalid @enderror">{{old('address',$account->address)}}</textarea>
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


@extends('myViews.admin.adminLayout.app')

@section('content')
<title>@section('title','Admin List')</title>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-md-12">

                <!-- DATA TABLE -->
                <div class="table-data__tool">
                    <div class="table-data__tool-left">
                        <div class="overview-wrap">
                            <h2 class="title-1">Admin List</h2>

                        </div>
                    </div>
                    <form class="form-header text-end" action="" method="GET">
                        <input class="au-input au-input--xl" type="text" name="search_admin" placeholder="Search for datas &amp; reports..." value="{{request('search_admin')}}" />
                        {{-- request method is get data from name attritube and it just like old method --}}
                        <button class="au-btn--submit" type="submit">
                            <i class="zmdi zmdi-search"></i>
                        </button>
                    </form>
                    <div class="table-data__tool-right">
                        <a href="{{route('admin#categoryPage')}}">
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                <i class="zmdi zmdi-plus"></i>add category
                            </button>
                        </a>
                        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                            CSV download
                        </button>
                    </div>


                </div>



                <div class="">
                    @if (session('createCategory'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('createCategory')}}</strong> You should check in on some of Admin list below.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif
                </div>

                <div class="">
                    @if (session('update'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('update')}}</strong> You should check in on some of Admin list below.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif
                </div>

                <div class="">
                    @if (session('changeUser'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('changeUser')}}</strong> You should check in on some of Admin list below.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif
                </div>

                <div class="">
                    @if (session('adminDelete'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{session('adminDelete')}}</strong> You should check in on some of Admin list below.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif
                </div>

                <div class="table-responsive table-responsive-data2 text-center">
                    <table class="table table-data2">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                        @if (count($adminData) != 0)
                            @foreach ($adminData as $data)

                               <tr class="tr-shadow">
                                  @if ($data->image != null)
                                  <td>
                                       <img src="{{asset('storage/' . $data->image)}}" alt="" width="100px">
                                    </td>
                                  @elseif($data->gender == 'female')
                                  <td>
                                       <img src="{{asset('image/default_female.jpg'  )}}" alt="" width="100px">
                                   </td>
                                   @else
                                   <td>
                                       <img src="{{asset('image/default_image.jpg'  )}}" alt="" width="100px">
                                   </td>
                                  @endif
                                   <td>{{$data->name}}</td>
                                   <td>{{$data->email}}</td>
                                   <td>{{$data->gender}}</td>
                                   <td>{{$data->phone}}</td>
                                   <td>{{$data->address}}</td>

                                   <td>
                                       <div class="table-data-feature ">

                                               <div class="">
                                                  <a href="{{route('admin#changeRolePage',$data->id)}}">
                                                       <button  class="item me-2" @if(Auth::user()->id == $data->id) hidden @endif  data-toggle="tooltip" data-placement="top" title="Change Role">
                                                           <i class="fa-solid fa-user-minus fs-6 text-center"></i>
                                                       </button>
                                                  </a>
                                               </div>

                                              <form action="{{route('admin#adminDelete',$data->id)}}" method="post">
                                               @csrf
                                               @method('delete')
                                               {{--လက်ရှိ login  ဝင် ထား တဲ့ id (Auth::user()->id) နှင့် အခု ရှိ နေ တဲ့  id တေ ($data->id) ထဲ က id နဲ့ တူ ရင် --}}
                                                   <button type="submit" class="item" @if(Auth::user()->id == $data->id) hidden @endif data-toggle="tooltip" data-placement="top" title="Delete">
                                                       <i class="zmdi zmdi-delete "></i>
                                                   </button>
                                              </form>


                                       </div>
                                   </td>
                               </tr>
                           @endforeach

                                <tr class="spacer"></tr>
                                <tr class="tr-shadow">


                        @else
                                    <tr>
                                        <td colspan="7" ><h4 class="text-muted">There is no data!</h4></td>
                                    </tr>

                        @endif
                        </tbody>
                    </table>
                </div>
                <!-- END DATA TABLE -->
               <div class="mt-4">
                    {{$adminData->links()}}
               </div>
            </div>
        </div>
    </div>
</div>
@endsection

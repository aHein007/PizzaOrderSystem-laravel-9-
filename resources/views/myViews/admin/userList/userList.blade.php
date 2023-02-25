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
                            <h2 class="title-1">User List</h2>

                        </div>
                    </div>
                    <form class="form-header text-end" action="" method="GET">
                        <input class="au-input au-input--xl" type="text" name="search_admin" placeholder="Search for datas &amp; reports..." value="{{request('search_admin')}}" />
                        {{-- request method is get data from name attritube and it just like old method --}}
                        <button class="au-btn--submit" type="submit">
                            <i class="zmdi zmdi-search"></i>
                        </button>
                    </form>



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
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody id="listBody">
                            @foreach ($userList as $user)

                            <tr class="tr-shadow">
                                <input type="hidden" id="userId" value="{{$user->id}}">
                                @if ($user->image != null)
                                    <td>
                                        <img src="{{asset('storage/' . $user->image)}}" class=" img-thumbnail " width="140px" style="height: 180px">

                                    </td>

                                    @elseif($user->gender == 'female')
                                    <td>
                                        <img src="{{asset('image/default_female.jpg')}}" alt="" width="300px" style="height: 180px">
                                    </td>
                                    @else
                                    <td>
                                        <img src="{{asset('image/default_image.jpg')}}" alt="" width="300px" style="height: 180px">
                                    </td>
                                @endif

                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->gender}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->address}}</td>
                                <td >
                                    <select name="changeRole" id="role" class="form-select change" style="width: 100px">

                                        <option value="admin" @if($user->role == 'user') selected @endif>Admin</option>
                                        <option value="user"  @if($user->role == 'user') selected @endif>User</option>
                                    </select>
                                </td>

                                <td></td>
                            </tr>



                            @endforeach
                            <tr class="spacer"></tr>
                             <tr class="tr-shadow"></tr>
                        </tbody>
                    </table>
                </div>
                <!-- END DATA TABLE -->
               <div class="mt-4">

               </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('JavaScriptTag')
    <script>
        $(document).ready(function(){
            $('.change').change(function(){

              $parentNode = $(this).parents("#listBody tr"); // this is all important code !
               $value = $(this).val();
              $userId =  $parentNode.find('#userId').val();



               $.ajax({
                type :'get',
                data:{'value':$value,'userId':$userId},
                url:'http://127.0.0.1:8000/adminListInUser/changeAdmin',
                dataType:'json',
                success:function(response){
                    console.log(response.status);
                }
            })

            location.reload();

            })


        })
    </script>
@endsection



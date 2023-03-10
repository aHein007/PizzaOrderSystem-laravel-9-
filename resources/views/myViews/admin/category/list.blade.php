@extends('myViews.admin.adminLayout.app')

@section('content')
<title>@section('title','Category')</title>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-md-12">

                <!-- DATA TABLE -->
                <div class="table-data__tool">
                    <div class="table-data__tool-left">
                        <div class="overview-wrap">
                            <h2 class="title-1">Category List</h2>

                        </div>
                    </div>
                    <form class="form-header text-end" action="" method="GET">
                        <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." value="{{request('search')}}" />
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
                        <strong>{{session('createCategory')}}</strong> You should check in on some of Category list below.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif
                </div>

                <div class="">
                    @if (session('update'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('update')}}</strong> You should check in on some of Category list below.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif
                </div>

                <div class="">
                    @if (session('deleteCategory'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{session('deleteCategory')}}</strong> You should check in on some of Category list below.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif
                </div>

                <div class="table-responsive table-responsive-data2 text-center">
                    <table class="table table-data2">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>CREATED DATE</th>
                                <th>STATUS</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                           @if (count($categoryData) != 0)
                                @foreach ($categoryData as $data)
                                <tr class="tr-shadow">
                                    <td>{{$data->id}}</td>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->created_at->format('j - F - Y')}}</td>
                                    <td>
                                        <span class="status--process">Processed</span>
                                    </td>
                                    <td>
                                        <div class="table-data-feature ">
                                            <a href="{{route('admin#categoryUpdatePage',$data->id)}}" class="m-2">
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button>
                                            </a>
                                            <form action="{{route('admin#categoryDelete',$data->id)}}" method="post" class="m-2">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </form>
                                           {{-- <a href="" class="m-2">
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                                <i class="zmdi zmdi-more"></i>
                                            </button>
                                           </a> --}}
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
                {{$categoryData->links()}}
               </div>
            </div>
        </div>
    </div>
</div>
@endsection

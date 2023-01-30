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
                            @foreach ($categoryData as $data)
                            <tr class="tr-shadow">
                                <td>{{$data->category_id}}</td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->created_at->format('j - F - Y')}}</td>
                                <td>
                                    <span class="status--process">Processed</span>
                                </td>
                                <td>
                                    <div class="table-data-feature">
                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="zmdi zmdi-edit"></i>
                                        </button>
                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                            <i class="zmdi zmdi-delete"></i>
                                        </button>
                                        <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                            <i class="zmdi zmdi-more"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            <tr class="spacer"></tr>
                            <tr class="tr-shadow">


                        </tbody>
                    </table>
                </div>
                <!-- END DATA TABLE -->
            </div>
        </div>
    </div>
</div>
@endsection

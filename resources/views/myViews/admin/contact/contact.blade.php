@extends('myViews.admin.adminLayout.app')

@section('content')
<title>@section('title','Contact')</title>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-md-12">

                <!-- DATA TABLE -->
                <div class="table-data__tool">
                    <div class="table-data__tool-left">
                        <div class="overview-wrap">
                            <h2 class="title-1">Contact List</h2>

                        </div>
                    </div>
                    <form class="form-header text-end" action="{{route('admin#contactPage')}}" method="GET">
                        <input class="au-input au-input--xl" type="text" name="search_contact" placeholder="Search for datas &amp; reports..." value="{{request('search_contact')}}" />
                        {{-- request method is get data from name attritube and it just like old method --}}
                        <button class="au-btn--submit" type="submit">
                            <i class="zmdi zmdi-search"></i>
                        </button>
                    </form>
                    <div class="table-data__tool-right">
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
                                <th>Email</th>
                                <th>Message</th>
                                <th>Created at</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                           @if (count($allContacts) == 0)
                                <td colspan="7">
                                    <h4>Not found contact data!</h4>
                                </td>
                             @else
                            @foreach ($allContacts as $contact)
                            <tr class="tr-shadow">
                                <td>{{$contact->id}}</td>
                                <td>{{$contact->name}}</td>
                                <td>{{$contact->email}}</td>
                                <td>
                                    {{$contact->message}}
                                </td>
                                <td>
                                    {{$contact->created_at->format('j / M / Y')}}
                                </td>
                                <td></td>
                            </tr>



                                {{-- <tr>
                                    <td colspan="7" ><h4 class="text-muted">There is no data!</h4></td>
                                </tr> --}}
                            @endforeach
                            <tr class="spacer"></tr>
                            <tr class="tr-shadow">
                           @endif
                        </tbody>
                    </table>
                </div>
                <!-- END DATA TABLE -->
               <div class="mt-4">
                {{$allContacts->links()}}
               </div>
            </div>
        </div>
    </div>
</div>
@endsection

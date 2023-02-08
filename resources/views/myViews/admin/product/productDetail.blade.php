!@extends('myViews.admin.adminLayout.app')


@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">


            <div class="col-lg-10 offset-1">
                <div class="card">
                    <div class="card-body">

                        <div class=" ms-3 pt-3">
                            <i class="cursor-pointer fa-solid fa-arrow-left-long " onclick="history.back()"></i>
                        </div>

                        <div class="card-title">
                            <h3 class="text-center title-2">Product Info</h3>

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

                                        <img src="{{asset('storage/productImage/' . $productItems['image'])}}" alt="John Doe" />

                                 </a>
                                 <div class="m-3 mt-5 text-center">
                                    <label for=""><i class="fa-brands fa-product-hunt text-danger"></i> Name</label> - {{$productItems['name']}}
                                </div>
                            </div>
                            <div class="col-6 ">
                                    <div class="info-container">

                                        <div class="m-3 ">
                                            <label for=""><i class="fa-solid fa-money-bill-wave text-success me-2"></i> Price</label> -  {{$productItems['price']}} $
                                        </div>
                                        <div class="m-3 ">
                                            <label for=""><i class="fa-solid fa-clock text-dark me-2"></i> Waiting Time</label> - {{$productItems['waiting_time']}} minutes
                                        </div>
                                        <div class="m-3 ">
                                            <label for=""><i class="fa-regular fa-rectangle-list text-primary me-2"></i> Category </label> - {{$productItems['category_name']}}
                                        </div>
                                        <div class="m-3 ">
                                            <label for=""><i class="fa-solid fa-eye text-info me-2"></i>View Count</label> - {{$productItems['view_count']}} views
                                        </div>

                                        <div class="m-3 ">
                                            <label for=""><i class="fa-solid fa-calendar-day me-2 text-info"></i> Created at</label> - {{$productItems['created_at']->format('j / m / Y')}}
                                        </div>

                                        <div class="m-3 ">
                                            <label for=""><i class="fa-solid fa-audio-description me-2 text-danger"></i> Description</label> :
                                            <div class="mt-2">
                                                {{$productItems['description']}}
                                            </div>
                                        </div>


                                    </div>

                            </div>


                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


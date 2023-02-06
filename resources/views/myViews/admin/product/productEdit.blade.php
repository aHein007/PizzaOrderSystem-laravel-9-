@extends('myViews.admin.adminLayout.app')

@section('content')
    <title>@section('title','Create')</title>
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    {{-- <div class="col-3 offset-8">
                        <a href="{{route('admin#productPage')}}"><button class="btn bg-dark text-white my-3">List</button></a>
                    </div> --}}
                </div>
                <div class="col-lg-6 offset-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Product Edit Form</h3>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-6">

                                </div>
                                <div class="col-6">
                                    <form action="" enctype="multipart/form-data" method="post" novalidate="novalidate">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <label for="cc-payment" class="control-label mb-1">Name</label>
                                            <input id="cc-pament" name="productName" type="text" class="form-control rounded mb-2 @error('productName') is-invalid @enderror" aria-required="true"  value="{{old('productName')}}" aria-invalid="false" placeholder="Enter Your Product...">
                                           @error('productName')
                                                <small class="text-danger">{{$message}}</small>
                                           @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="cc-payment" class="control-label mb-1">Price</label>
                                            <input id="cc-pament" name="productPrice" type="text" class="form-control rounded  mb-2 @error('productPrice') is-invalid @enderror" aria-required="true"  value="{{old('productPrice')}}" aria-invalid="false" placeholder="Enter Your Price">
                                            @error('productPrice')
                                                <small class="text-danger">{{$message}}</small>
                                           @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="cc-payment" class="control-label mb-1">Image</label>
                                            <input id="cc-pament" name="image" type="file" class="form-control  rounded mb-2 @error('image') is-invalid @enderror" aria-required="true"  aria-invalid="false" placeholder="Enter Your Image">
                                            @error('image')
                                                <small class="text-danger">{{$message}}</small>
                                           @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="cc-payment" class="control-label mb-1">Waiting Time</label>
                                            <input id="cc-pament" name="waitingTime" type="number" class="form-control  rounded mb-2 @error('waitingTime') is-invalid @enderror" aria-required="true"  value="{{old('waitingTime')}}" aria-invalid="false" placeholder="Enter Your waiting time">
                                            @error('waitingTime')
                                                <small class="text-danger">{{$message}}</small>
                                           @enderror
                                        </div>


                                        <div class="form-group mb-3">
                                            <label for="cc-payment" class="control-label mb-1">Category</label>
                                            <select name="category" id=""  class="form-select  rounded mb-2 @error('category') is-invalid @enderror">
                                                <option value="">Choose Category...</option>
                                                {{-- @foreach ($category as $items)
                                                    <option value="{{$items->id}}">{{$items->name}}</option>
                                                @endforeach --}}
                                            </select>

                                            @error('category')
                                            <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>



                                        <div class="form-group mb-3">
                                            <label for="cc-payment" class="control-label mb-1">Description</label>
                                            <textarea name="description"  cols="10" rows="3" class="form-control  rounded mb-2 @error('description') is-invalid @enderror"   placeholder="Enter your description">{{old('description')}}</textarea>
                                            @error('description')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>

                                        <div class="" >
                                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block w-100 mt-2 mb-2">
                                                <span id="payment-button-amount ">Create
                                                <i class="fa-solid fa-circle-right"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

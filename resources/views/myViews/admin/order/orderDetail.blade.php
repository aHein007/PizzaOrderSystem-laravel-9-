@extends('myViews.admin.adminLayout.app')

@section('content')
<title>@section('title','Product')</title>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-md-12">

                <!-- DATA TABLE -->
                <div class="table-data__tool">
                    <div class="table-data__tool-left">
                        <div class="overview-wrap">
                            <h2 class="title-1">Product List</h2>

                        </div>
                    </div>



                </div>

                <a href="{{route('admin#orderPage')}}" class="text-dark">
                    <i class="fa-solid fa-arrow-left-long "></i>
                </a>

                <div class="card w-50 mt-2" >
                    <div class="card-header p-4" style="height: 300px">
                        <h2 class=""><i class="fa-solid fa-clipboard me-2"></i> Order Info</h2>
                        <small class="text-warning"><i class="fa fa-warning" aria-hidden="true"></i> Include Delivery Charges!</small>
                        <div class="row mt-3">
                            <div class="col-6">
                                <div class="mb-4"><i class="fa-regular fa-user me-3"></i>Name</div>
                                <div class="mb-4"><i class="fa-solid fa-barcode me-3"></i>Order Code</div>
                                <div class="mb-4"><i class="fa-solid fa-clock me-3"></i> Order Date</div>
                                <div class="mb-4"><i class="fa-solid fa-money-bill-wave me-3"></i>Total</div>
                            </div>
                            <div class="col-6">
                                <div class="mb-4">{{$orderDetail[0]->userName}}</div>
                            <div class="mb-4">{{$orderDetail[0]->order_code}}</div>
                            <div class="mb-4">{{$orderDetail[0]->created_at->format('j / M / Y')}}</div>
                            <div class="mb-4">{{$orderDetail[0]->total}} kyats</div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="">
                    @if (session('productCreate'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('productCreate')}}</strong> You should check in on some of Product list below.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif
                </div>

                <div class="">
                    @if (session('productUpdate'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('productUpdate')}}</strong> You should check in on some of Product list below.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif
                </div>

                <div class="">
                    @if (session('productDelete'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{session('productDelete')}}</strong> You should check in on some of Product list below.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif
                </div>

                <div class="table-responsive table-responsive-data2 text-center">
                    <table class="table table-data2">
                        <thead>
                            <tr>

                                <th>User Id</th>
                                <th>User Name</th>
                                <th>Product Image</th>
                                <th>Product Name</th>
                                <th>Order Date</th>
                                <th>Qty</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderDetail as $detail)
                            <tr class="tr-shadow">

                                <td class="">
                                    <div class="p-5">{{$detail->user_id}}</div>
                                </td>
                                <td>{{$detail->userName}}</td>
                                <td>
                                    <img src="{{asset('storage/productImage/'. $detail->image)}}" class=" img-thumbnail"  width="100px" alt="">
                                </td>
                                <td>{{$detail->productName}}</td>
                                <td>{{$detail->created_at}}</td>
                                <td>{{$detail->qty}}</td>
                                <td>{{$detail->total}} kyats</td>
                            </tr>
                            {{-- <i class="fa-solid fa-eye text-info"></i> --}}
                            {{-- <i class="fa-solid ms-1 fa-money-bill-1-wave text-success"></i> --}}
                            <tr class="spacer"></tr>
                            <tr class="tr-shadow">
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- END DATA TABLE -->

            </div>
        </div>
    </div>
</div>
@endsection

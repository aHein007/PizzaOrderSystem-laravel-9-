@extends('myViews.user.layouts.userMaster')

@section('content')
<div class="container-fluid">
    <title>@section('title','MultiShop - Online Shop Website Template')</title>
    <div class="row px-xl-5">
        <!-- Shop Sidebar Start -->
        <div class="col-lg-3 col-md-4">
            <!-- Price Start -->
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter By Category</span></h5>
            <div class="bg-light p-4 mb-30">
                <form>
                    <div class="custom-control  d-flex align-items-center justify-content-between mb-3">
                        <a href="{{route('user#home')}}" class="text-dark text-decoration-none" for="price-1">All Category</a>
                        <span class="badge font-weight-normal text-dark">{{count($category)}}</span>
                    </div>

                    <hr class="text-muted">

                    @foreach ($category as $items )
                    <div class="  d-flex align-items-center justify-content-between mb-3 pt-1">
                          <a href="{{route('users#filterProcess',$items->id)}}" class="text-dark cursor-pointer text-decoration-none">
                           {{$items->name}}
                          </a>
                    </div>
                    @endforeach


                </form>
            </div>
            <!-- Price End -->

            <!-- Color Start -->

            <!-- Color End -->

            <!-- Size Start -->

            <div class="">
                <button class="btn btn btn-warning w-100">Order</button>
            </div>
            <!-- Size End -->
        </div>
        <!-- Shop Sidebar End -->


        <!-- Shop Product Start -->
        <div class="col-lg-9 col-md-8">
            <div class="row pb-3">
                <div class="col-12 pb-1">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div>
                            <button class="btn btn-sm btn-light"><i class="fa fa-th-large"></i></button>
                            <button class="btn btn-sm btn-light ml-2"><i class="fa fa-bars"></i></button>
                        </div>
                        <div class="ml-2">
                            <div class="btn-group">
                               <select name="sorting" class="form-select" id="sortingOption">
                                <option value="">Choose Option</option>
                                <option value="asc">Ascending</option>
                                <option value="desc">Descending</option>
                               </select>
                            </div>

                        </div>
                    </div>
                </div>
                <span class="row" id="myList">
                  @if (count($pizza) == 0)
                    <span class=" m-auto text-center fs-5 text-muted shadow-sm p-3 w-50 ">There is no category data!</span>
                  @else
                  @foreach ($pizza as $items)
                  <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                  <div class="product-item bg-light mb-4">
                      <div class="product-img position-relative overflow-hidden">
                          <img class="img-fluid w-100 " style="height: 250px" src="{{asset('storage/productImage/' . $items->image)}}" alt="" >
                          <div class="product-action">
                              <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                          
                              {{-- <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a> --}}
                              <a class="btn btn-outline-dark btn-square" href="{{route('user#detailPage',$items->id)}}"><i class="fa-solid fa-circle-info"></i></a>
                          </div>
                      </div>

                      <div class="text-center py-4">
                          <a class="h6 text-decoration-none text-truncate" href="">{{$items->name}}</a>
                          <div class="d-flex align-items-center justify-content-center mt-2">
                              <h5>{{$items->price}} kyats</h5><h6 class="text-muted ml-2"><del>80000</del></h6>
                          </div>
                          <div class="d-flex align-items-center justify-content-center mb-1">
                              <small class="fa fa-star text-warning mr-1"></small>
                              <small class="fa fa-star text-warning mr-1"></small>
                              <small class="fa fa-star text-warning mr-1"></small>
                              <small class="fa fa-star text-warning mr-1"></small>
                              <small class="fa fa-star text-warning mr-1"></small>
                          </div>
                      </div>
                  </div>
                  </div>
              @endforeach
                  @endif
                </span>
            </div>
        </div>
        <!-- Shop Product End -->
    </div>
</div>
@endsection



@section('scriptSourse')
    <script>
        $(document).ready(function(){
        let value =  $('#sortingOption').change(function(){
            if(value.val() == "asc"){
                $.ajax({
                    type:'get',
                    url:'http://127.0.0.1:8000/user/ajax/pizzaList',
                    dataType:'json',
                    data:{'status':'asc'},
                    success:function(response){
                    let list ='';
                        for(let i = 0 ; i < response.length; i++)
                        {
                            list += `
                            <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                                <div class="product-item bg-light mb-4">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" style='width:230px' src="{{asset('storage/productImage/${response[i].image}')}}" alt="" >
                                <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>

                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa-solid fa-circle-info"></i></a>
                                </div>
                            </div>

                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href="">${response[i].name}</a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5>${response[i].price} kyats</h5><h6 class="text-muted ml-2"><del>80000</del></h6>
                                </div>
                                    <div class="d-flex align-items-center justify-content-center mb-1">
                                        <small class="fa fa-star text-warning mr-1"></small>
                                        <small class="fa fa-star text-warning mr-1"></small>
                                        <small class="fa fa-star text-warning mr-1"></small>
                                        <small class="fa fa-star text-warning mr-1"></small>
                                        <small class="fa fa-star text-warning mr-1"></small>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            `
                        }
                        $('#myList').html(list)
                    }
                })
            }else if(value.val() == "desc"){
                $.ajax({
                    type:'get',
                    url:'http://127.0.0.1:8000/user/ajax/pizzaList',
                    dataType:'json',
                    data:{'status':'decs'},
                    success:function(response){
                        let list ='';
                        for(let i = 0 ; i < response.length; i++)
                        {
                            list += `
                            <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                                <div class="product-item bg-light mb-4">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" style='width:230px' src="{{asset('storage/productImage/${response[i].image}')}}" alt="" >
                                <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>

                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa-solid fa-circle-info"></i></a>
                                </div>
                            </div>

                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href="">${response[i].name}</a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5>${response[i].price} kyats</h5><h6 class="text-muted ml-2"><del>80000</del></h6>
                                </div>
                                    <div class="d-flex align-items-center justify-content-center mb-1">
                                        <small class="fa fa-star text-warning mr-1"></small>
                                        <small class="fa fa-star text-warning mr-1"></small>
                                        <small class="fa fa-star text-warning mr-1"></small>
                                        <small class="fa fa-star text-warning mr-1"></small>
                                        <small class="fa fa-star text-warning mr-1"></small>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            `
                        }
                        $('#myList').html(list)
                    }
                })
            }
        })

        });
    </script>
@endsection


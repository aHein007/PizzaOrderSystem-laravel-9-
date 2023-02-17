@extends('myViews.user.layouts.userMaster')

@section('content')
<div class="container-fluid pb-5">
    @section('title','Detail')
   <div class="row px-xl-5">
    <div class="col-lg-5 mb-30">
        <div class=" mt-2 mb-2"><a href="{{route('user#home')}}" class=" text-dark text-decoration-none"><i class="fa-solid fa-arrow-left-long"></i> Back</a></div>
        <div id="product-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner bg-light">
                <div class="carousel-item active">
                    <img class="w-100" src="{{asset('storage/productImage/'. $productDetail->image)}}" alt="Image"  height="400px">
                </div>

            </div>
        </div>
    </div>

    <div class="col-lg-7 h-auto mb-30">
        <div class="h-100 bg-light p-30">
            <h3>{{$productDetail->name}}</h3>
            <div class="d-flex mb-3">
                <div class="text-warning  mr-2">
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star-half-alt"></small>
                    <small class="far fa-star"></small>
                </div>
                <small class="pt-1">(99 Reviews)</small>
            </div>
            <h3 class="font-weight-semi-bold mb-4">{{$productDetail->price}} kyats</h3>
            <p class="mb-4">{{$productDetail->description}}</p>
            <div class="d-flex align-items-center mb-4 pt-2">
                <div class="input-group quantity mr-3" style="width: 130px;">
                    <div class="input-group-btn">
                        <button class="btn btn-warning  btn-minus">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <input type="text" class="form-control bg-secondary border-0 text-center" value="1" id="numberOfCart">
                    <div class="input-group-btn">
                        <button class="btn btn-warning  btn-plus">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>


                    <input type="hidden" value="{{Auth::user()->id}}" id='userId'>
                    <input type="hidden" value="{{$productDetail->id}}" id="productId">

                    {{-- ajax is not need id and route --}}
                    <button type="button" class="btn btn-warning  px-3" id="addCartBtn"><i class="fa fa-shopping-cart mr-1" ></i> Add To Cart</button>

            </div>
            <div class="d-flex pt-2">
                <strong class="text-dark mr-2">Share on:</strong>
                <div class="d-inline-flex">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-pinterest"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="row px-xl-5">
        <div class="col">
            <div class="bg-light p-30">
                <div class="nav nav-tabs mb-4">
                    <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Description</a>
                    <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-3">Reviews (0)</a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <h4 class="mb-3">Product Description</h4>
                        <p>{{$productDetail->description}}</p>
                    </div>

                    <div class="tab-pane fade" id="tab-pane-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mb-4">1 review for "Product Name"</h4>
                                <div class="media mb-4">
                                    {{-- <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;"> --}}
                                    <div class="media-body">
                                        <h6>John Doe<small> - <i>01 Jan 2045</i></small></h6>
                                        <div class="text-warning  mb-2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <p>Diam amet duo labore stet elitr ea clita ipsum, tempor labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4 class="mb-4">Leave a review</h4>
                                <small>Your email address will not be published. Required fields are marked *</small>
                                <div class="d-flex my-3">
                                    <p class="mb-0 mr-2">Your Rating * :</p>
                                    <div class="text-warning ">
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <form>
                                    <div class="form-group">
                                        <label for="message">Your Review *</label>
                                        <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Your Name *</label>
                                        <input type="text" class="form-control" id="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Your Email *</label>
                                        <input type="email" class="form-control" id="email">
                                    </div>
                                    <div class="form-group mb-0">
                                        <input type="submit" value="Leave Your Review" class="btn btn-warning  px-3">
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
<!-- Shop Detail End -->


<!-- Products Start -->
<div class="container-fluid py-5">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">You May Also Like</span></h2>
    <div class="row px-xl-5">
        <div class="col">
            <div class="owl-carousel related-carousel">
                @for ($i = 0 ; $i < count($pizzaList); $i++)
                <div class="product-item bg-light">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="{{asset('storage/productImage/'.$pizzaList[$i]->image)}}" style="height: 230px" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href="{{route('user#detailPage',$pizzaList[$i]->id)}}"><i class="fa-solid fa-circle-info"></i></a>


                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="">{{$pizzaList[$i]->name}}</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>{{$pizzaList[$i]->price}} kyats</h5><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star text-warning  mr-1"></small>
                            <small class="fa fa-star text-warning  mr-1"></small>
                            <small class="fa fa-star text-warning  mr-1"></small>
                            <small class="fa fa-star text-warning  mr-1"></small>
                            <small class="fa fa-star text-warning  mr-1"></small>
                            <small>(99)</small>
                        </div>
                    </div>
                </div>
                @endfor

            </div>
        </div>
    </div>
</div>
<!-- Products End -->
@endsection

@section('scriptSourse')

{{-- <script>
    // $(document).ready(function(){
    //     $('#addCartBtn').click(function(){


    //        $source ={
    //             'count' : $('#inputCart').val(),
    //             'userId' : $('#userId').val(),
    //             'productId' :$('#productId').val()
    //       }

    //       console.log($source);

    //         $.ajax({
    //             type : 'get',
    //             url :'http://127.0.0.1:8000/user/ajax/addCart',
    //             data : $source,
    //             dataType :'json',

    //             success:function(response){
    //                 if(response.status == 'success'){
    //                     window.location.href ="http://127.0.0.1:8000/user/home"
    //                 }

    //             }


    //         })
    //     })
    // })



</script> --}}

<script>
    $(document).ready(function(){





        $('#addCartBtn').click(function(){

            let idData ={
            'count' :   $('#numberOfCart').val(),
            'userId' :  $('#userId').val(),
            'productId' :$('#productId').val()
        }


            $.ajax({
                type :'get',
                data : idData,
                url : 'http://127.0.0.1:8000/user/ajax/addCart',
                dataType: 'json',
                success:function(response){ // return response()->json() result is in here! in (response)
                    if(response.status == 'success'){
                        window.location.href ="http://127.0.0.1:8000/user/home"
                    }
                }
            })
        })
    })
</script>

@endsection

@extends("myViews.user.layouts.userMaster")

@section('content')
<div class="container-fluid">
    @section('title','Cart')
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th></th>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody class="align-middle" id="tableBody">
                  @foreach ($cartList as $cart)

                  <tr>
                    <td><img src="{{asset('storage/productImage/'. $cart->image)}}" alt="" style="width: 50px;"></td>
                    <input type="hidden" value="{{$cart->user_id}}" id='userId'>
                    <input type="hidden" value="{{$cart->product_id}}" id='productId'>
                    <td class="align-middle">{{$cart->name}}</td>
                    <td class="align-middle" id="price">{{$cart->price}} kyats</td>
                    <td class="align-middle">
                        <div class="input-group quantity mx-auto" style="width: 100px;">
                            <div class="input-group-btn" class="minus">
                                <button class="btn btn-sm btn-warning btn-minus">
                                <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center" value="{{$cart->qty}}" id='qty'>
                            <div class="input-group-btn" >
                                <button class="btn btn-sm btn-warning btn-plus" >
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                    <td class="align-middle" id='total'>{{$cart->price * $cart->qty }} kyats</td>
                    <td class="align-middle"><button class="btn btn-sm btn-danger removeBtn"><i class="fa fa-times"></i></button></td>
                </tr>
                  @endforeach




                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="border-bottom pb-2">
                    <div class="d-flex justify-content-between mb-3">
                        <h6>Subtotal</h6>
                        <h6 id='totalPrice'>{{$totalPrice}} kyats</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Delivery</h6>
                        <h6 class="font-weight-medium">3000 kyats</h6>
                    </div>
                </div>
                <div class="pt-2">
                    <div class="d-flex justify-content-between mt-2">
                        <h5>Total</h5>
                        <h5 id='finalTotal'>{{$totalPrice + 3000}} kyats</h5>
                    </div>
                    <button class="btn btn-block btn-warning font-weight-bold my-3 py-3" id="checkout">Proceed To Checkout</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scriptSourse')
    <script src="{{asset('js/cart.js')}}"></script>

    <script>
        $(document).ready(function(){

            $orderList =[];

            $('#checkout').click(function(){
                $("#tableBody tr").each(function(index,row){
                    $orderList.push({
                        'user_id' : $(row).find('#userId').val(),
                        'product_id' :$(row).find('#productId').val(),
                        'qty' :$(row).find('#qty').val(),
                        'total' :$(row).find('#total').text().replace('kyats','') * 1,
                        'order_code' : 'Ps' + Math.floor(Math.random() * 100000000000)
                    })
                })

                $.ajax({
                    type:'get',
                    data:Object.assign({},$orderList),
                    url:'http://127.0.0.1:8000/user/ajax/order',
                    dataType:'json',
                    success:function(response){
                      if(response.status =="success"){
                        window.location.href ='http://127.0.0.1:8000/user/home'
                      }
                    }
                })



            })
        })
    </script>
@endsection

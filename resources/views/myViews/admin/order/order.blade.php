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
                            <h2 class="title-1">Order List</h2>

                        </div>
                    </div>

                    <form action="{{route('admin#sorting')}}" method="post" class="w-25 mt-1">
                        @csrf
                        <div class="input-group">
                            <select class="form-select" name="filterStatus" aria-label="Example select with button addon">
                                <option value="all" @if(request('filterStatus')== 'all' ) selected  @endif>All</option>
                                <option value="0" @if(request('filterStatus')== 0) selected @endif>Pending</option>
                                <option value="1" @if(request('filterStatus')== 1) selected @endif>Success</option>
                                <option value="2" @if(request('filterStatus')== 2) selected @endif>Reject</option>
                            </select>
                            <button class="btn btn-outline-secondary" type="submit">Filter</button>
                          </div>
                    </form>




                    <form class="form-header text-end" action="{{route('admin#orderPage')}}" method="GET">
                        <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." value="{{request('search')}}"  />
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
                                <th>Order Id</th>
                                <th>User Name</th>
                                <th>Order Code</th>
                                <th>STATUS</th>
                                <th>Order Date</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody id='tableBody'>
                            @foreach ($orderList as $order)
                            <tr class="tr-shadow">
                                <td id="orderId">{{$order->id}}</td>
                                <td>{{$order->userName}}</td>
                                <td>
                                    <a href="{{route('admin#orderDetail',$order->order_code)}}" class=" text-decoration-none">{{$order->order_code}}</a>
                                </td>


                                <td >
                                    <select name="status" class="form-select changeState" >
                                        <option value="0" @if($order->status == 0) selected @endif >Pending...</option>
                                        <option value="1"  @if($order->status == 1) selected @endif>Success...</option>
                                        <option value="2"  @if($order->status == 2) selected @endif>Reject...</option>
                                    </select>
                                </td>
                                <td>{{$order->created_at->format('d / F / Y')}}</td>
                                <td class="priceing">{{$order->total_price}} kyats</td>
                            </tr>


                            @endforeach
                            <tr class="spacer"></tr>
                            <tr class="tr-shadow"></tr>
                        </tbody>
                    </table>
                    <div class="mt-3">
                        {{$orderList->links()}}
                    </div>
                </div>
                <!-- END DATA TABLE -->

            </div>
        </div>
    </div>
</div>
@endsection

@section("JavaScriptTag")
    <script>
        $(document).ready(function(){
        //   $('#searchFilter').change(function(){
        //     $status =$('#searchFilter').val();

        //     $.ajax({
        //         type:'get',
        //         url:'http://127.0.0.1:8000/admin/order/ajax/status',
        //         data:{
        //             'status' :$status
        //         },
        //         dataType:'json',
        //         success:function(response){
        //                 $sorting = '';
        //                 for (let i = 0; i < response.data.length; i++) {
        //                    let getTime = changeTime(response.data[i].created_at)

        //                     if(response.data[i].status == 0){
        //                         $statusMessage =`
        //                         <select name="status" class="form-select changeState">
        //                                 <option value="0" selected >Pending...</option>
        //                                 <option value="1"   >Success...</option>
        //                                 <option value="2"  >Reject...</option>
        //                             </select>
        //                         `
        //                     }else if(response.data[i].status == 1){
        //                         $statusMessage =`
        //                         <select name="status" class="form-select changeState">
        //                                 <option value="0"  >Pending...</option>
        //                                 <option value="1" selected  >Success...</option>
        //                                 <option value="2"  >Reject...</option>
        //                             </select>
        //                         `
        //                     }else{
        //                         $statusMessage =`
        //                         <select name="status" class="form-select changeState">
        //                                 <option value="0">Pending...</option>
        //                                 <option value="1">Success...</option>
        //                                 <option value="2" selected >Reject...</option>
        //                             </select>
        //                         `
        //                     }


        //                 $sorting +=`
        //                     <tr class="tr-shadow">
        //                         <td>${response.data[i].id}</td>
        //                         <td>${response.data[i].userName}</td>
        //                         <td>${response.data[i].order_code}</td>


        //                         <td>${$statusMessage}</td>
        //                         <td>${getTime}</td>
        //                         <td>${response.data[i].total_price} kyats</td>
        //                     </tr>
        //                     `
        //                      }
        //                      $('#tableBody').html($sorting);
        //         }
        //     });
        //   });


          $('.changeState').change(function(){
            $currentState =$(this).val();
               $parentNode = $(this).parents("#tableBody tr");
            $orderId =$parentNode.find('#orderId').text();


            $.ajax({
                type:'get',
                url:'http://127.0.0.1:8000/admin/order/ajax/changeStatus',
                dataType:'json',
                data:{'orderId':$orderId,'currentState':$currentState},
                success:function(response){
                    console.log(response);
                }
            })
          })

        })

        let changeTime=(date)=>{
            let currentTime =new Date(date);
                            let day =currentTime.getDate();
                            let month =currentTime.getMonth() + 1;
                            let year = currentTime.getFullYear();

                            let changeFormate = day +' / '+ getMonthName(month) +' / '+ year;
                        return changeFormate;
        }

        let getMonthName =(monthNumber)=>{// need to understand!
            const monthName =new Date();
            monthName.setMonth(monthNumber - 1);
           return monthName.toLocaleString([],{
                month:'long'
            });
        }
    </script>
@endsection

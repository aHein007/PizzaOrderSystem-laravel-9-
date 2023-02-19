
@extends("myViews.user.layouts.userMaster")

@section('content')
<div class="container-fluid">
    @section('title','Cart')
    <div class="row px-xl-5" style="height:430px">
        <div class="col-lg-8 offset-2 table-responsive mb-5">
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>

                        <th>Date</th>
                        <th>Order Id</th>
                        <th>Total Price</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody class="align-middle" id="tableBody">
                    @foreach ($orderList as $items)
                    <tr>
                        <td>{{$items->created_at->format('d - F - Y')}} </td>
                        <td>{{$items->order_code}}</td>
                        <td>{{$items->total_price}} kyats</td>
                        <td>@if ($items->status == 0)
                            <i class="fa-solid fa-clock text-warning"></i>
                            <span class="text-warning"> Pending...</span>
                            @elseif($items->status == 1)
                            <i class="fa-solid fa-check text-success"></i>
                            <span class="text-success"> Success...</span>
                            @else
                            <i class="fa-solid fa-triangle-exclamation text-danger me-2"></i>
                            <span class="text-danger me-1"> Reject...</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach




                </tbody>
            </table>
        </div>
        {{$orderList->links()}}
    </div>
</div>
@endsection



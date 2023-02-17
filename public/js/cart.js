$(document).ready(function(){// this is important code
    
    $('.btn-plus').click(function(){
      $parentNode = $(this).parents("tr");// to find parent div
      $price = Number($parentNode.find('#price').text().replace("kyats","")); // and find id

         $qty = Number($parentNode.find('#qty').val()); //(Number method) is change string to Number
        $total =$price * $qty;

        $totalTag =$parentNode.find('#total');
        $parentNode.find('#total').html($total + ' kyats');
        //done count price

       total();
    })

    $('.btn-minus').click(function(){

        $parentNode = $(this).parents("tr");
        $price = Number($parentNode.find('#price').text().replace("kyats","")); // and find id
      $qty = Number($parentNode.find('#qty').val());
      $total =$price * $qty;

      $totalTag =$parentNode.find('#total');

    $qty <= 0 ? $totalTag.html(0 + " kyats") : $totalTag.html($total + ' kyats');

        total();

    })

    $('.removeBtn').click(function(){

        $parent =$(this).parents('tr')

        $parent.remove();

        total()
    })

    let  total=()=>
    {
     //total price summery
     $addPrice =0;
        $data= $('#tableBody tr #total').each(function(index,row){//this is important code
           $totalPrice =Number($(this).text().replace("kyats","")); // (this) is value  but why use (this) because value is not funciton it just value
           $addPrice+=$totalPrice;

        })
        $('#totalPrice').html(`${$addPrice} kyats`);
        $('#finalTotal').html($addPrice + 3000 + ' kyats');
    }
})

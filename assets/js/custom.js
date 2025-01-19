$(document).ready(function (){

    //$('.increment-btn').click(function (e){
    $(document).on('click','.increment-btn',function (e){    
        e.preventDefault();

        var qty = $(this).closest('.product_data').find('.input-qty').val();
        
        var value =parseInt(qty, 10);
        value = isNaN(value) ? 0 : value;
        if(value < 10)
        {
            value++;
     
            $(this).closest('.product_data').find('.input-qty').val(value);
        }
    });

   // $('.decrement-btn').click(function (e){
    $(document).on('click','.decrement-btn',function (e){    
        e.preventDefault();

        var qty = $(this).closest('.product_data').find('.input-qty').val();
        
        var value =parseInt(qty, 10);
        value = isNaN(value) ? 0 : value;
        if(value > 1)
        {
            value--;
     
            $(this).closest('.product_data').find('.input-qty').val(value);
        }
    });

    //$('.addToCartBtn').click(function (e){
    $(document).on('click','.addToCartBtn',function (e){    
        e.preventDefault();

        let qty = $(this).closest('.product_data').find('.input-qty').val();
        let prod_id = $(this).val();
        let unit_price = $('.selling-price').text();


       $.ajax({
            method: "POST",
            url: "function/handlecart.php",
            data: {
                "prod_id": prod_id,
                "prod_qty": qty,
                "scope": "add",
                //"unit_price": unit_price
            },
            success: function (response){
                if(response == 201)
                {
                    alertify.success("Product added to cart");
                }
                else if(response == "existing")
                {
                    alertify.success("Product already in cart");
                }
                else if(response == 401)
                {
                    alertify.success("Login to contunue");
                    
                }
                else if(response == 500)
                {
                    alertify.success("Something Went to Wrong");
                } else if(response == 405)
                {
                    alertify.success("User is not in session");
                }
            }
        });

    });

    $(document).on('click','.updateQty',function (){

        let qty = $(this).closest('.product_data').find('.input-qty').val();
        
        let prod_id = $(this).closest('.product_data').find('.prodId').val();

        $.ajax({
            method: "POST",
            url: "function/handlecart.php",
            data: {
                "prod_id": prod_id,
                "prod_qty": qty,
                "scope": "update",
           
            },
            success: function (response) {
                
            }
        });
    });

    $(document).on('click','.deleteItem',function (){
        let  cart_id = $(this).val()

        $.ajax({
            method: "POST",
            url: "function/handlecart.php",
            data: {
                "cart_id": cart_id,
                "scope": "delete",
              
            },
            success: function (response) {
                if(response == 200)
                {
                    alertify.success("Item deleted successfully");
                    $('#mycart').load(location.href + " #mycart");
                }else{
                    alertify.success(response);
                }
            }
        });
       
    });

});

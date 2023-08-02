<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>SmartSpec</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>
    @include('partial.navbaruser')

    @yield('content')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" crossorigin="anonymous"></script>

    <script>
        $('.compare').on('click',function(){
            //save the clicked button in a variable to change the color if saved
            var compareBtn = $(this);
            //save the id of the product in a variable to pass through ajax to the route
            // $(this).data('productid') means -- get the value from attribute data-productid of the button just clicked, you can see i have added an attribute the compare button
            var productId = $(this).data('productid');
              // Data to be sent in the POST request
            var data = {
                product_id: productId
            };
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/addToCompare", // URL where the request should be sent
                type: "POST", // Request method
                data: data, // Data to be sent in the request body
                dataType: "json", // Expected data type of the response
                success: function(response) {
                    if(response.action == 'removed'){
                        compareBtn.css('background','#888888');
                    }else{
                        compareBtn.css('background','green');
                        
                    }
                    console.log(response);
                    console.log(response.message);
                },
                error: function(xhr, status, error) {
                    // This function will be executed if the request fails
                    console.error("Error adding product to compare:", error);
                }
            });
        });
        $('.remove-compare').on('click',function(){
            //save the clicked button in a variable to change the color if saved
            var compareBtn = $(this);
            //save the id of the product in a variable to pass through ajax to the route
            // $(this).data('productid') means -- get the value from attribute data-productid of the button just clicked, you can see i have added an attribute the compare button
            var specId = $(this).data('productid');
              // Data to be sent in the POST request
            var data = {
                specId: specId
            };
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/removeFromCompare", // URL where the request should be sent
                type: "POST", // Request method
                data: data, // Data to be sent in the request body
                dataType: "json", // Expected data type of the response
                success: function(response) {
                    location.reload();
                    // if(response.action == 'removed'){
                    //     compareBtn.css('background','#888888');
                    // }else{
                    //     compareBtn.css('background','red');
                    // }
                    // console.log(response);
                    // console.log(response.message);
                },
                error: function(xhr, status, error) {
                    // This function will be executed if the request fails
                    console.error("Error adding product to compare:", error);
                }
            });
        });

    </script>
</body>
</html>

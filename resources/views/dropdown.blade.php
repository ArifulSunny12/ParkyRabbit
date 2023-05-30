<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    
    <meta name="csrf-token" content="{{csrf_token()}}"> 


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>increase item quantity</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4" >
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="alert alert-primary mb-4 text-center">
                   <h4 >Add item</h4>
                </div> 
                <form>

                    <div class="form-group mb-3">

                       <label for="product" class="form-label">Product:</label>
                        <select  id="product-dropdown" class="form-control">
                            <option value="">-- Select product --</option>
                            @foreach ($product as $data)
                            <option value="{{$data->id}}">
                                {{$data->product}}
                                
                            </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group mb-3">
                    <label for="product" class="form-label">Item:</label>
                        <select id="item-dropdown" class="form-control">
                        </select>
                    </div>




                    <div class="form-group">
                    <label for="product" class="form-label">existing Quantity:</label>
                        <!-- <select id="quantity-dropdown" class="form-control">
                        </select> -->

                        <input id="existingQ" type="input" class="form-control" name="existingQ" value="" >
                    </div>


                    <br>
                    <div class="form-group">
                    <label for="product" class="form-label">add Quantity:</label>
                    <input id="NewQuantity" type="text" class="form-control" name="NewQuantity" value="" placeholder="number of new item">
                    </div>

                    <br>
                    <button id="IncreaseQuantity" type="button" class="btn btn-primary">Increase Quantity</button>

                    
                    


                </form>
            </div>
        </div>
    </div>
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>

    



        $(document).ready(function () {

            
  
            /*------------------------------------------
            --------------------------------------------
            product Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#product-dropdown').on('change', function () {
                var idproduct = this.value;
                $("#item-dropdown").html('');

                

                $.ajaxSetup({
                headers:
                { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
                });

               
                $.ajax({
                    url: "{{url('api/fetch-item')}}",
                    type: "POST",
                    data: {
                        product_id: idproduct,
                       
                        
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#item-dropdown').html('<option value="">-- select item --</option>');


                        $.each(result.item, function (key, value) {
                            $("#item-dropdown").append('<option value="' + value
                                .id + '">' + value.item +'</option>');
                        });

                        
                        var quantityValue = "--";

                        $('#quantity-dropdown').html('<option value=""> '+quantityValue+ '</option>');
                        

                    }
                });
            });
  
            /*------------------------------------------
            --------------------------------------------
            item Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#item-dropdown').on('change', function () {
                var item_id = this.value;
                
                $("#quantity-dropdown").html('');
               
                $.ajaxSetup({
                headers:
                { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
                });

                
                
                $.ajax({
                    url: "{{url('api/fetch-quantity')}}",
                    type: "POST",
                    data: {
                        item_id: item_id,     
                        
                    },
                    dataType: 'json',
                    success: function (res) {

                        //$.each(res.quantity, function (key, value) {
                            $("#existingQ").val(res.quantity[0].quantity);
                        //});
                        

                        
                    }
                });
            });





                 /*------------------------------------------
            --------------------------------------------
            increase quantity Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#IncreaseQuantity').on('click', function () {
                
                var selected_item = $('#item-dropdown :selected').val();
                var selected_item_number = $("#NewQuantity").val();
                var exixting_quantity = $("#existingQ").val();
                if(exixting_quantity==""){
                    exixting_quantity=0;
                }
                if(selected_item_number==""){
                    selected_item_number=0;
                }
                var totall_quantity = parseInt(selected_item_number) + parseInt(exixting_quantity);
               
                $.ajaxSetup({
                headers:
                { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
                });

                
                console.log('test')
                $.ajax({
                    url: "{{url('api/increase-quantity')}}",
                    type: "POST",
                    data: {
                        item_id: selected_item,
                        quantity:totall_quantity    
                        
                    },
                    dataType: 'json',
                    success: function (res) {

                        alert('successfully saved')
                        
                    }
                });
            });
  











  
        });
    </script>
</body>
</html>
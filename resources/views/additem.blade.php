<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    
    <meta name="csrf-token" content="{{csrf_token()}}"> 


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>add new item</title>
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


                    <br>
                    <div class="form-group">
                    <label for="product" class="form-label">type new Item:</label>
                    <input id="idproduct" type="hidden" class="form-control" name="idproduct" value="" >
                    <input id="itemName" type="text" class="form-control" name="NewItem" value="" placeholder="number of new item">
                    </div>

                  

                    <br>
                    <button id="IncreaseQuantity" type="button" class="btn btn-primary">Add new item</button>

                    
                    


                </form>
            </div>
        </div>
    </div>
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>

    



        $(document).ready(function () {

            
  
            /*------------------------------------------
            --------------------------------------------
           get product id from dropdown to insert item under that product
            --------------------------------------------
            --------------------------------------------*/

            $('#product-dropdown').on('change', function () {
                var idproduct = this.value;
                $('#idproduct').val(idproduct);
                
            
            });




            $('#IncreaseQuantity').on('click', function () {
                
                var productVal= $('#idproduct').val();
                var itemName= $('#itemName').val();

                $.ajaxSetup({
                headers:
                { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
                });

               
                $.ajax({
                    url: "{{url('additem')}}",
                    type: "POST",
                    data: {
                        product_id: productVal,
                        item:itemName,
                       
                        
                    },
                    dataType: 'json',
                    success: function (result) {
                        alert('create success');
                       

                   

                    }
                });
            });
  
            

        });
    </script>
</body>
</html>
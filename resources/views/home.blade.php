@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('admin panel') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('') }}




<!-- catagory  add form start -->
    <form  action="{{url('')}}/home" method="post">

    @csrf

  <div class="mb-3 mt-3">
    <label for="type" class="form-label">Product Type:</label>
    <input type="text" class="form-control" id="type" placeholder="Enter Product Type" name="type">
  </div>

  <div class="mb-3 mt-3">
    <input type="hidden" value="{{ Auth::user()->name }}" class="form-control" id="type" placeholder="Enter Product Type" name="username">
  </div>

  <button type="submit" class="btn btn-primary">Create Product</button>




 </form>


 <br>
 <br>
 <br>
 <button type="submit" class="btn btn-primary"> <a href="{{url('')}}/additem" style="color:white; text-decoration: none;">Add items to Product</a> </button>
 <br>
 <br>
<button type="submit" class="btn btn-primary"> <a href="{{url('')}}/dropdown" style="color:white; text-decoration: none;">Increase Item Quantity</a> </button>


<!-- catagory  add form end -->


<!--  item add form start 
<form  action="{{url('')}}/productcreate" method="post">

@csrf

<div class="mb-3 mt-3">
<label for="type" class="form-label">Product Type:</label>
<input type="text" class="form-control" id="type" placeholder="Enter Product Type" name="type">
</div>

<div class="mb-3 mt-3">
<input type="hidden" value="{{ Auth::user()->name }}" class="form-control" id="type" placeholder="Enter Product Type" name="username">
</div>

<button type="submit" class="btn btn-primary">Create Product</button>
</form>

  item add form end -->



                </div>
            </div>
        </div>
    </div>
</div>
@endsection

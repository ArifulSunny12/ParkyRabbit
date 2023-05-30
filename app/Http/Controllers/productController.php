<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\products;
use App\Models\items;
use App\Models\quantity;

class productController extends Controller
{
    public function show(){
        $product = product::all();
        
    }

    public function onproductcreate(Request $request){
       

        $product = new products;
        $product->product = $request['type'];
       
        $product->save();
        
        return view('home');
    }
    

    public function oninsert(Request $request){
        echo "<pre>";
        print_r($request->all());

        $product = new product;
        $product->type = $request['type'];
        $product->item = $request['item'];
        $product->username = $request['username'];
        $product->save();
    }




}

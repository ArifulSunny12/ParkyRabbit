<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use App\Models\items;
use App\Models\quantity;

class DropdownController extends Controller
{
    public function products()
    {
        $data['product'] = products::get(["product", "id"]);
        return view('dropdown', $data);
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function fetchitem(Request $request)
    {
        $data['item'] = items::where("product_id", $request->product_id)
                                ->get(["item", "id"]);
  
        return response()->json($data);
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function fetchquantity(Request $request)
    {
        
        $data['quantity'] = quantity::where("item_id", $request->item_id)
                                    ->get(["quantity", "id"]);                        
        return response()->json($data);
    }
    

    public function increasequantity(Request $request)
    {
        
        // $data['quantity'] = quantity::where("item_id", '=', $request->item_id)
        // ->first();
        // $data->quantity =$request->quantity;
        // $data->save();

        quantity::whereId("item_id", '=', $request->item_id)->update($request->all());

                                    
        return "success";  
        //response()->json($data);
    }

    public function addItem()
    {
        $data['product'] = products::get(["product", "id"]);
        return view('additem', $data);
    }

    public function addItem2(Request $request){
        echo "<pre>";
        print_r($request->all());

        $item = new items;
        $item->product_id = $request['product_id'];
        $item->item = $request['item'];
        $item->save();
    }

    
}

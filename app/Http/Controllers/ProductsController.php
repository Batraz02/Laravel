<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
      public function getProduct() 
    {
    	$product=Product::get();
    	return response()->json($product);
    }


     public function addProduct(Request $Digor)
    {
    	$product=new Product();
    	$product->name=$Digor->name;
    	$product->price=$Digor->price;
    	$product->quantity=$Digor->quantity;
    	$u=$product->save(); 
    	if ($u)
    	 return "OK";

    	return "NEOK";
    }



    public function deleteProduct(Request $req)
    {
        $product = Product::where("name", $req->name)->first();
        $product->delete();
        return response()->json("Товар удалён");
      }

}

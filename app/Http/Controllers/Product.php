<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mproduct;
class Product extends Controller
{
     public function getProduct() 
    {
    	$user=Mproduct::get();
    	return response()->json($user);
    }

    public function addProduct(Request $Digor)
    {
    	$user=new Mproduct();
    	$user->name=$Digor->name;
    	$user->price=$Digor->price;
    	$user->quantity=$Digor->quantity;
    	$u=$user->save(); 
    	if ($u)
    	 return "OK";

    	return "NEOK";
    } 

}

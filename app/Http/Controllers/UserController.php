<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    public function getUser() 
    {
    	$user=User::get();
    	return response()->json($user);
    }

    public function addUser(Request $Digor)
    {
    	$user=new User();
    	$user->name=$Digor->name;
    	$user->last_name=$Digor->last_name;
    	$user->age=$Digor->age;
    	$u=$user->save(); 
    	if ($u)
    	 return "OK";

    	return "NEOK";
    } 
    public function updateUser(Request $Digor)
    {
    	$user=User::where("id",$Digor->id)->first();
    	$user->name=$Digor->name;
    	$user->last_name=$Digor->last_name;
    	$user->age=$Digor->age;
    	$user->save();
    	return response()->json($user);
    }

}

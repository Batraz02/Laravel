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


    public function registerUser(Request $req)
    {
        $l = false;
        $cal ="";
        if($req->name == null)
        {
            $l = true;
            $cal .='Name не на базе';
        }
        if($req->last_name == null)
        {
            $l = true;
            $cal .='last_name не на базе';
        }
        if($req->age == null)
        {
            $l = true;
            $cal .='Age не на базе';
        }
        if($req->phone_number == null)
        {
            $l = true;
            $cal .='Phone_number не на базе';
        }
        if($req->password == null)
        {
            $l = true;
            $cal .='Password не на базе';
        }
        if($l == false)
        {
            $user = new User();
            $user -> create($req->all());
            $cal = 'Все ок!';
        }

            return response()->json($cal);
    }
	public function singUser(Request $req)
    {
     $user = User::where('phone_number', $req->phone_number)->first();

    if(!$user)
        return response()->json('Введите логин');

    if($req->password != $user->password)

       return response()->json('Введите пароль');
       return response()->json('Все ок!'); 



   		 
	}

}

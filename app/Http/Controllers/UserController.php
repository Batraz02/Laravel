<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
     public function registerValid(Request $req)
    {
        $valid = Validator::make($req->all(), [
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
        'phone_number' => 'required',
        ]);

        if ($valid->fails())
            return response()->json($valid->errors());

        $user = User::create($req->all());
        return response()->json('Регистрация прошла успешно');
    }



        public function loginValid(Request $req) 
    {
        $valid = Validator::make($req->all(), [
            'phone_number' => 'required',
            'password' => 'required',
        ]);

        if ($valid->fails()) {
            return response()->json($valid->errors());
        }

        if($user = User::where('phone_number', $req->phone_number)->first())
        {
            if ($req->password == $user->password)
            {
                $user->api_token=str_random(50);
                $user->save();
                return response()->json('Авторизацияпрошла успешно, api_token:'. $user->api_token);
            }
        }
                return response()->json('Логин или пароль введены неверно, api_token:'. $user->api_token);
    }


     public function logoutValid(Request $req)
    {
        $user = User::where("api_token",$req->api_token)->first();

       if($user)
        {
            $user->api_token = null;
            $user->save();
            return response()->json('Разлогирование прошло успешно');
        }
    }

}

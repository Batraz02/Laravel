<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Product;

class ProductController extends Controller
{
      public function getProduct() 
    {
    	$user=Product::get();
    	return response()->json($user);
    }

    public function addProduct(Request $Digor)
    {
    	$user=new Product();
    	$user->name=$Digor->name;
    	$user->price=$Digor->price;
    	$user->quantity=$Digor->quantity;
    	$u=$user->save(); 
    	if ($u)
    	 return "OK";

    	return "NEOK";
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

        $student = Student::create($req->all());
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

        if($student = Student::where('phone_number', $req->phone_number)->first())
        {
            if ($req->password == $student->password)
            {
                $student->api_token=str_random(50);
                $student->save();
                return response()->json('Авторизацияпрошла успешно, api_token:'. $student->api_token);
            }
        }
                return response()->json('Логин или пароль введены неверно, api_token:'. $student->api_token);
    }


        public function logoutValid(Request $req)
        {
            $student = Student::where("api_token",$req->api_token)->first();

            if($student)
            {
                $student->api_token = null;
                $student->save();
                return response()->json('Разлогирование прошло успешно');
            }
        }

}
}

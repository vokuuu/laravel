<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; //add
use App\Models\User;
use Illuminate\Support\Str;


class UsController extends Controller
{
    public function getUsers()
    {
    	$user = User::get();

    	return response()->json($user);
    }

    public function addUser(Request $hme)
    {
    	$user = new User();

    	$user->name = $hme->name;
    	$user->last_name = $hme->last_name;
    	$user->age = $hme->age;

    	$dap = $user->save();
    	if($dap)
    	return "ALL OK";
    return "ALL NOT OK";
    }

    public function apdateUser(Request $hme)
    {
    	$user = User::where("id", $hme->id)->first();

    	$user->name = $hme->name;
    	$user->last_name = $hme->last_name;
    	$user->age = $hme->age;

    	$dap = $user->save();

    	return response()->json($user);
    }

    public function registrUser(Request $hme)
    {
    	$ujas= true;
        $pomogiti ="";
        if($hme->name == null)
        {
            $ujas = false;
            $pomogiti .='поле name не заполнено ';
        }
        if($hme->last_name == null)
        {
            $ujas = false;
            $pomogiti .='поле last_name не заполнено ';
        }
        if($hme->age == null)
        {
           $ujas = false;
            $pomogiti .='поле age не заполнено ';
        }
        if($hme->data_b == null)
        {
            $ujas = false;
            $pomogiti .='поле data_b не заполнено ';
        }
        if($hme->password == null)
        {
            $ujas = false;
            $pomogiti .='поле password не заполнено ';
        }
        if($hme->number == null)
        {
            $ujas = false;
            $pomogiti .='поле number не заполнено ';
        }
        if($ujas == true)
        {
            $user = new User();
            $user -> create($hme->all());
            $pomogiti = 'ALL OK';
        }
        return response()->json($pomogiti);
    }

    public function autorizUser(Request $hme)
    {

        $user = User::where('number', $hme->number)->first();

        if(!$user)
        	return response()->json('Логин не введен. Пожалуйста, введи логин или выйдите за дверь!');

        if($hme->password != $user->password)

            return response()->json('Пароль не введен. Пожалуйста, введи пароль или выйдите за дверь!');
        return response()->json('Норм поц! Залетай!');
    }

    

    //============================ВАЛИДАЦИЯ============================//

    public function registrValid(Request $hme)
    {
        $valid = Validator::make($hme->all(), [
        'name' => 'required',
        'last_name' => 'required',
        'age' => 'required',
        'data_b' => 'required',
        'password' => 'required',
        'number' => 'required',
         ]);

        if ($valid->fails())
            return response()->json($valid->errors());

        $user = User::create($hme->all());
        return response()->json('ОК ( - 3 -)');
    }



     public function loginValid(Request $hme) 
    {
        $valid = Validator::make($hme->all(), [
            'number' => 'required',
            'password' => 'required',
        ]);

        if ($valid->fails()) {
            return response()->json($valid->errors());
        }

        if($user = User::where('number', $hme->number)->first())
        {
            if ($hme->password == $user->password)
            {
                $user->api_token=Str::random(50);
                $user->save();
                return response()->json('Авторизация OK, api_token:'. $user->api_token);
            }
        }
                return response()->json('Логин или пароль не OK, api_token:'. $user->api_token);
    }

    public function logoutValid(Request $hme)
        {
            $user = User::where("api_token",$hme->api_token)->first();

            if($user)
            {
                $user->api_token = "0";
                $user->save();
                return response()->json('Разлогирование прошло успешно');
            }
        }
}



<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

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
            $student = new User();
            $student -> create($hme->all());
            $pomogiti = 'ALL OK';
        }
        return response()->json($pomogiti);
    }

}

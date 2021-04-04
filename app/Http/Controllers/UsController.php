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
}

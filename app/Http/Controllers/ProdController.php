<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class ProdController extends Controller
{
    public function getProd()
    {
    	$san = Product::get();

    	return response()->json($san);
    }


    public function addProd(Request $hme)
    {
    	$san = new Product();

    	$san->name = $hme->name;
    	$san->quantity = $hme->quantity;
    	$san->price = $hme->price;

    	$dap = $san->save();
    	if($dap)
    	return "ALL OK";
    return "ALL NOT OK";
    }


    public function deleteProd(Request $hme)
	{
		$san = Product::where("name", $hme->name)->first();
        $san->delete();
        return response()->json("-Галя, посмотри товар на складе!	- Нет!	-Что?! Галя!	- Да нет его! Что ты орешь?	-Нет товара, молодой человек.");
  	}
}

<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
	public function create(Request $request){
		$product = [];
		$product['name'] = $request->input('name');
		$product['qty'] = $request->input('qty');
		$product['price'] = $request->input('price');
		$date = date_create();
		$product['datetime'] = date_format($date, 'Y-m-d H:i:s');
		$product['total'] = strval($product['qty'] * $product['price']);

		$jsonString = file_get_contents(base_path('resources/products.json'));
		$data = json_decode($jsonString, true);
			$data[$product['name']] = $product;

		file_put_contents(base_path('resources/products.json'), json_encode($data,JSON_PRETTY_PRINT));
		return response()
			->view('form-info', ['product' => $product]);

	}
}

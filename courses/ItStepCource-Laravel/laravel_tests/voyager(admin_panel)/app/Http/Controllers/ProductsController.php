<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\ProductsModel;

class ProductsController extends Controller
{
    public function show(Request $request){

        //Получение моделей StudentsModel
        $products_array = ProductsModel::all();

        // Шаблон  в `products.blade.php`
        return view('products', ['products_array' => $products_array ]);

    }
}

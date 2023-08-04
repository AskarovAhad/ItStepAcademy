<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\ProductsModel;

use Illuminate\Support\Facades\Validator;



class ProductsController extends Controller
{
    //

    public function show(Request $request){

        $action = $request->input('action');
        $name = $request->input('name');
        $price = $request->input('price');
        $rate = $request->input('rate');


        if ($action=='insert') {

            $validated = Validator::make($request->all(),[
                'name' => 'required|alpha_num|max:10|min:3|unique:products_table,name',
                'price' => 'required|numeric|max:10000|min:100',
                'rate' => 'required|numeric|max:10|min:0',
            ]);

            if ($validated->fails()){
                return redirect('/products')
                        ->withErrors($validated)
                        ->withInput();
            }

            $product = new ProductsModel;
            $product->name = $name;
            $product->price = $price;
            $product->rate = $rate;
            $product->save();

            return redirect('/products');

        }

        //Получение моделей StudentsModel
        $products_array = ProductsModel::all();

        // Шаблон  в `products.blade.php`
        return view('products', ['products_array' => $products_array ]);

    }



    public function save(Request $request){

        $price_usd = $request->input('price_usd');
        $id = $request->input('id');
        $product = ProductsModel::find($id);
        $product->price_usd = $price_usd;
        $product->save();

        return redirect('/products');
    }



}

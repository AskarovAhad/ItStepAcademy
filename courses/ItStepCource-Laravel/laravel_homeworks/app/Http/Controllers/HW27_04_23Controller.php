<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HW27_04_23Controller extends Controller
{
    public function hw27_04_23($what_to_do = 'main')
    {
        if($what_to_do == 'main') return view('main');
        if($what_to_do == 'about') return view('about');
        if($what_to_do == 'products') return view('products');
        if($what_to_do == 'contacts') return view('contacts');
    }
}


?>
